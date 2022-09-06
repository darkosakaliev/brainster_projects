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
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 1,
        ]);

        Project::create([
            'name' => 'Example App Two',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 2,
        ]);

        Project::create([
            'name' => 'Example App Three',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 3,
        ]);

        Project::create([
            'name' => 'Example App Four',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 4,
        ]);

        Project::create([
            'name' => 'Example App Five',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 1,
        ]);

        Project::create([
            'name' => 'Example App',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 2,
        ]);

        Project::create([
            'name' => 'Example App Two',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 3,
        ]);

        Project::create([
            'name' => 'Example App Three',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 4,
        ]);

        Project::create([
            'name' => 'Example App Four',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 1,
        ]);

        Project::create([
            'name' => 'Example App Five',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque voluptatibus voluptates deleniti! Suscipit, in, ullam neque debitis optio voluptates nihil quasi sequi cupiditate sunt sint maxime sed laboriosam repellendus labore beatae ad adipisci temporibus dicta nulla eius modi voluptatum necessitatibus. Modi dicta illo quasi veritatis adipisci non temporibus, architecto maxime illum nisi aut eligendi saepe consectetur obcaecati veniam debitis aperiam labore omnis, quod accusamus est? Doloremque dol',
            'created_by' => 2,
        ]);

        foreach(Project::all() as $project) {
            $academies = Academy::inRandomOrder()->take(rand(3, 4))->pluck('id');
            $project->academies()->attach($academies);
        };
    }
}
