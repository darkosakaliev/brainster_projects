<?php

namespace Database\Seeders;

use App\Models\Academy;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Example App',
            'description' => 'Lorem Ipsum',
            'created_by' => 1,
        ]);

        Project::create([
            'name' => 'Example App Two',
            'description' => 'Lorem Ipsum Two',
            'created_by' => 2,
        ]);

        foreach(Project::all() as $project) {
            $academies = Academy::inRandomOrder()->take(rand(3,4))->pluck('id');
            $project->academies()->attach($academies);
        };
    }
}
