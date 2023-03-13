<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Student;
use App\Models\Owner;
use App\Models\Car;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    //     Course::factory()->count(3)->create();
    //     Student::factory()->count(10)->create();
    //    Course::factory()->count(2)->has(Student::factory()->count(rand(10,20)))->create();
    // Course::factory()->count(20)->hasStudents(rand(10,20))->create();

        Owner::factory()->hasCars()->count(100)->create();

    }
}
