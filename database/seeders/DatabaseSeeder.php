<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // \App\Models\User::factory(10)->create();

        //Seeding Types For Lectures and Plays :
        $this->call(TypeLectureSeeder::class);
        $this->call(TypePlaySeeder::class);

        // Department Seeder :
        $this->call(DepartmentSeeder::class);

        // Book Seeder :
        $this->call(BookSeeder::class);

        // Plan Seeder :
        // $this->call(PlanSeeder::class);




        // Admin seeding And Admin Rating :

        User::factory()->create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'type' => 'admin',
            'password' => Hash::make('password'),
        ]);

        Rating::factory()->create([
            'user_id' => '1',
            'rating' =>  "5",
            ]);

        // Users Seeder

       for ($i=1; $i <= 10 ; $i++) {
        \App\Models\User::factory()->create([
            'name' => 'a'."$i",
            'type' => 'user',
            'email' => 'a'."$i".'@gmail.com',
            'password' => Hash::make('password'),
        ]);
       }


       // General Report Seeder :
       $this->call(GeneralReportSeeder::class);

       // Rating Seeder :

       $this->call(RatingSeeder::class);
    }
}
