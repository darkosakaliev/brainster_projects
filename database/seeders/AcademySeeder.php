<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academy::insert([
            ['name' => 'Backend Development', 'profession' => 'Backend Dev'],
            ['name' => 'Frontend Development', 'profession' => 'Frontend Dev'],
            ['name' => 'Marketing', 'profession' => 'Marketer'],
            ['name' => 'Data Science', 'profession' => 'Data Scientist'],
            ['name' => 'Design', 'profession' => 'Designer'],
            ['name' => 'QA', 'profession' => 'QA Engineer'],
            ['name' => 'UX/UI', 'profession' => 'UX/UI Designer']
        ]);
    }
}
