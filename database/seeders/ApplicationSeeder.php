<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::insert([
            'description' => 'Mark Doe Lorem ipsum dolor',
            'user_id' => 3,
            'project_id' => 1
        ]);

        Application::insert([
            'description' => 'Jane Doe Lorem ipsum dolor',
            'user_id' => 2,
            'project_id' => 1
        ]);

        Application::insert([
            'description' => 'John Doe Lorem ipsum dolor',
            'user_id' => 1,
            'project_id' => 2
        ]);
    }
}
