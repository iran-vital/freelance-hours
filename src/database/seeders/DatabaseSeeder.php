<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Proposal;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(200)->create();

        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $user) {
                $project = Project::factory()->create(['created_by' => $user->id]);

                Proposal::factory()
                    ->count(random_int(4, 45))->create(['project_id' => $project->id]);

                    ArrangePositions::run($project->id);
            });

        

    }
}
