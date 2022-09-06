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
            'description' => 'Some message from this user about why they want to join in the realization of your genius idea.',
            'user_id' => 2,
            'project_id' => 1
        ]);

        Application::insert([
            'description' => 'Some message from this user about why they want to join in the realization of your genius idea.',
            'user_id' => 3,
            'project_id' => 1
        ]);

        Application::insert([
            'description' => 'Some message from this user about why they want to join in the realization of your genius idea.',
            'user_id' => 4,
            'project_id' => 1
        ]);
    }
}
