<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Lesson::factory(10000)->create();
        Student::factory(10000)->create();

        $this->createLeassonsStudent();
    }

    protected function createLeassonsStudent()
    {
        $maxLessons = Lesson::max('id');
        $maxStudent = Student::max('id');

        for ($i=0; $i < 100000; $i++) { 
            DB::table('lesson_student')->insert([
                'student_id' => random_int(1,$maxStudent),
                'lesson_id' => random_int(1,$maxLessons)
            ]);
        }
    }
}
