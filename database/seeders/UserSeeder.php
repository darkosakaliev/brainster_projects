<?php

namespace Database\Seeders;

use App\Models\Academy;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'johndoe@example.com',
            'bio' => 'John Doe Lorem Ipsum Dolor Sit Amet.',
            'profile_image' => '1661612532-JohnDoe.jpg',
            'password' => Hash::make('John1234'),
            'academy_id' => 1
        ]);

        User::create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'email' => 'janedoe@example.com',
            'bio' => 'Jane Doe Lorem Ipsum Dolor Sit Amet.',
            'profile_image' => '1661625293-JaneDoe.jpg',
            'password' => Hash::make('Jane1234'),
            'academy_id' => 2
        ]);

        foreach (User::all() as $user) {
            $skills = Skill::inRandomOrder()->take(rand(5, 10))->pluck('id');
            $user->skills()->attach($skills);
        }
    }
}
