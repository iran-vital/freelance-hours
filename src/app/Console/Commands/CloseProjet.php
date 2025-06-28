<?php

namespace App\Console\Commands;

use App\Models\Project;

use Illuminate\Console\Command;

class CloseProjet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:close-projet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Project::query()
            ->where('status', 'open')
            ->where('ends_at', '<=', now())
            ->update(['status' => 'closed']);
    }
}
