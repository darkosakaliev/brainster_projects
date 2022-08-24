<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills =
        Skill::insert([
            ['name' => 'Data Analysis'],
            ['name' => 'Business Intelligence'],
            ['name' => 'Machine Learning'],
            ['name' => 'Data Visualizations'],
            ['name' => 'Deep Learning'],
            ['name' => 'Statistics'],
            ['name' => 'Python'],
            ['name' => 'Power Bi'],
            ['name' => 'NumPy'],
            ['name' => 'Keras'],
            ['name' => 'TensorFlow'],
            ['name' => 'Pandas'],
            ['name' => 'OpenCV'],
            ['name' => 'Writing and Executing Test Cases and Scenarios'],
            ['name' => 'Test Design'],
            ['name' => 'Translating Manual Test Cases Into Automation Scripts'],
            ['name' => 'Defect Reporting'],
            ['name' => 'Quality Assurance'],
            ['name' => 'Waterfall and SCRUM Methodology'],
            ['name' => 'Java'],
            ['name' => 'C#'],
            ['name' => 'Kiwi'],
            ['name' => 'Selenium Web Driver'],
            ['name' => 'Illustrator'],
            ['name' => 'Photoshop'],
            ['name' => 'InDesign'],
            ['name' => 'XD'],
            ['name' => 'LightRoom'],
            ['name' => 'Typography'],
            ['name' => 'Branding'],
            ['name' => 'Poster Design'],
            ['name' => 'Logo Design'],
            ['name' => 'Package Design'],
            ['name' => 'Digital Marketing Strategy'],
            ['name' => 'Social Media Marketing'],
            ['name' => 'Facebook and Instagram Ads'],
            ['name' => 'Google Ads'],
            ['name' => 'Copywriting'],
            ['name' => 'Content Marketing'],
            ['name' => 'Landing Pages'],
            ['name' => 'Lead Generation'],
            ['name' => 'E-mail Marketing'],
            ['name' => 'Search Engine Optimization'],
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Bootstrap'],
            ['name' => 'JavaScript'],
            ['name' => 'jQuery'],
            ['name' => 'AJAX'],
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'ReactJS'],
            ['name' => 'GIT'],
            ['name' => 'UX/UI'],
            ['name' => 'MySQL'],
            ['name' => 'InVision Studio'],
            ['name' => 'Figma'],
            ['name' => 'SQL'],
            ['name' => 'Data Warehouse'],
            ['name' => 'AWS Management Control'],
            ['name' => 'Big Data'],
            ['name' => 'Database Management'],
            ['name' => 'Postman'],
            ['name' => 'Apache'],
            ['name' => 'JMeter'],
            ['name' => 'Google Analytics']
        ]);
    }
}
