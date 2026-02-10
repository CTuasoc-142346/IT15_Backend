<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'user_name' => '@AaravPatel',
            'title' => 'Library Timings Today',
            'text' => 'Does anyone know if the library is open during lunch break today?',
            'category_id' => 1
        ]);
        Post::create([
            'user_name' => '@AdminOffice',
            'title' => 'Half Day Tomorrow',
            'text' => 'Tomorrow (Feb 12) will be a half day due to the teachers’ meeting.',
            'category_id' => 2
        ]);
        Post::create([
            'user_name' => '@SanyaKumar',
            'title' => 'Mitosis vs Meiosis Explanation',
            'text' => 'Can someone explain the difference between mitosis and meiosis in simple terms?',
            'category_id' => 3
        ]);
        Post::create([
            'user_name' => '@EventCoordinator',
            'title' => 'Annual Day Celebration',
            'text' => 'Annual Day celebration on Feb 25th. Rehearsals start from Monday.',
            'category_id' => 6
        ]);
        Post::create([
            'user_name' => '@SportsCaptain',
            'title' => 'Inter-School Football Victory',
            'text' => 'Our school won the inter-school football tournament! Proud of the team!',
            'category_id' => 5
        ]);
        Post::create([
            'user_name' => '@KaranMalhotra',
            'title' => 'Are Weekly Tests Helpful?',
            'text' => 'Do you think weekly tests actually help or just increase stress?',
            'category_id' => 4
        ]);
        Post::create([
            'user_name' => '@ScienceDept',
            'title' => 'District Science Exhibition Selection',
            'text' => 'Selected students will represent our school at the district science exhibition.',
            'category_id' => 5
        ]);
        Post::create([
            'user_name' => '@IshaBanerjee',
            'title' => 'Online vs Written Assignments',
            'text' => 'Online assignments vs written assignments—what’s better and why?',
            'category_id' => 4
        ]);
        Post::create([
            'user_name' => '@PrincipalDesk',
            'title' => 'Annual Examination Schedule',
            'text' => 'Annual examinations will begin from March 5th. Detailed timetable will be shared soon.',
            'category_id' => 2
        ]);
        Post::create([
            'user_name' => '@AdityaJoshi',
            'title' => 'Chemistry Test Syllabus',
            'text' => 'What chapters are included for the upcoming chemistry test?',
            'category_id' => 3
        ]);
        Post::create([
            'user_name' => '@SchoolAdmin',
            'title' => 'ID Card Submission Deadline',
            'text' => 'Students are requested to submit their ID card applications by Friday.',
            'category_id' => 2
        ]);
        Post::create([
            'user_name' => '@AnjaliRao',
            'title' => 'Previous Year Math Paper',
            'text' => 'Does anyone have last year’s math question paper?',
            'category_id' => 3
        ]);
    }
}
