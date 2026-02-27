<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::factory()
            ->count(10)
            ->state(new Sequence(
                ['title' => 'Administrative Aide I', 'salary_grade' => 1],
                ['title' => 'Teacher I', 'salary_grade' => 11],
                ['title' => 'Cash Clerk I', 'salary_grade' => 4],
                ['title' => 'Teacher III', 'salary_grade' => 13],
                ['title' => 'Director III', 'salary_grade' => 27],
                ['title' => 'Senator', 'salary_grade' => 31],
                ['title' => 'Engineer III', 'salary_grade' => 19],
                ['title' => 'Elementary School Principal I', 'salary_grade' => 19],
                ['title' => 'Administrative Aide II', 'salary_grade' => 2],
                ['title' => 'Administrative Assistant V', 'salary_grade' => 11],
            ))
            ->create();
    }
}
