<?php

namespace App\Livewire\Proposals;

use App\Models\Project;

use Livewire\Attributes\Validate;

use Livewire\Component;
use App\Models\Proposal;
use App\Notifications\NewProposal;
use \App\Notifications\PerdeuMane;
use App\Actions\ArrangePositions;
use Illuminate\Support\Facades\DB; 

class Create extends Component
{

    public Project $project;

    public bool $modal = false;

    #[Validate(['required', 'email'])]
    public string $email = '';


    #[Validate(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;

    public bool $agree = false;

    public function save(){

        $this->validate();

        if (!$this->agree) {
            $this->addError('agree', 'Você deve aceitar as condições.');
            return;
        }

        DB::transaction(function() {
            
            $proposal = $this->project->proposals()
                ->updateOrCreate(
                    ['email' => $this->email],
                    ['hours' => $this->hours]
                );
    
            $this->arrangePositions($proposal);

        });

        $this->project->author->notify(new NewProposal($this->project));

        
        $this->dispatch('proposal::created');

        $this->modal = false;
    }

    public function arrangePositions(Proposal $proposal)
    {
        $query = DB::select('
                select *, row_number() over (order by hours) as newPosition
                from proposals
                where project_id = ?
            ', [$this->project->id]);

        foreach ($query as $row) {
            Proposal::where('id', $row->id)->update(['position' => $row->newPosition]);
        }

        $position = collect($query)->where('id', '=', $proposal->id)->first();

        if ($position) {
            $proposal->update(['position' => $position->newPosition]);
        }

        $otherProposal = collect($query)->where('position', '=', $position->newPosition)->first();

        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);

            $oProposal = Proposal::find($otherProposal->id);
            $oProposal->update(['position_status' => 'down']);
            $oProposal->notify(new PerdeuMane($this->project));

            // if ($otherProposal->id !== $proposal->id) {
            //     Proposal::query()->where('id', $otherProposal->id)
                
            //     ->update(['position_status' => 'down']);
            // }
        }

        if ($proposal->project) {
            ArrangePositions::run($proposal->project->id);
        }

    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
