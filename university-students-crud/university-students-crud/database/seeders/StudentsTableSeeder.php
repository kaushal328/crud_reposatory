<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     
    
    	 public function run(): void
    {
           $faker = Faker::create();
             $teacherIds = DB::table('teachers')->pluck('id')->toArray();
          foreach (range(1, 30) as $index) {
           DB::table('students')->insert([
                'teacher_id' => $faker->randomElement($teacherIds), // Randomly assign a teacher ID from the existing IDs
                'student_name' => $faker->name, // Generate a random name for student_name
                'class' => $faker->word, // Replace 'class' with a valid Faker method like 'word' or 'sentence'
                'admission_date' => $faker->date, // Use 'date' for a random date
                'yearly_fees' => $faker->numberBetween(1000, 5000), // Use 'numberBetween' to generate a random fee
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    
}
