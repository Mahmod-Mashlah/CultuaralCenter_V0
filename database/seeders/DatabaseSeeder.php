<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\PlaySeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laratrust\Traits\HasRolesAndPermissions;


class DatabaseSeeder extends Seeder
{   use HasRolesAndPermissions;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // \App\Models\User::factory(10)->create();

        //Seeding Types For Lectures and Plays :
        $this->call(TypeLectureSeeder::class);
        $this->call(TypePlaySeeder::class);
        $this->call(DayTypeSeeder::class);

        // Department Seeder :
        $this->call(DepartmentSeeder::class);

        // Book Seeder :
        $this->call(BookSeeder::class);


        // Lecture Seeder :
        $this->call(LectureSeeder::class);


        // Play Seeder :
        $this->call(PlaySeeder::class);

        // Plan Seeder :
        // $this->call(PlanSeeder::class);


        // Roles Laratrust Seeder :
        $this->call(LaratrustSeeder::class);

        // Admin seeding And Admin Rating :

        User::factory()->create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'type' => 'admin',
            'password' => Hash::make('password'),
            'birthdate' =>  '2000-11-11',
            'serial_number' =>  '09876543210',
            'phone_number' =>  '0987070814',
            'address' =>  'Damascus, Airplane Street , IT College , Internet_room',
            // 'role' => $role,
            // 'role-name' => $roleName,
        ]);
        $admin = User::get()
                    ->where('id', 1)
                    ->first();
        $admin->addRole('admin');

        Rating::factory()->create([
            'user_id' => '1',
            'rating' =>  "5",
            ]);

        // Users Seeder

       for ($i=1; $i <= 9 ; $i++) {
        \App\Models\User::factory()->create([
            'name' => 'a'."$i",
            'type' => 'user',
            'email' => 'a'."$i".'@gmail.com',
            'password' => Hash::make('password'),
            'birthdate' =>  '2000-01-0'.$i,
            'serial_number' =>  '0123456789'.$i,
            'phone_number' =>  '099999999'.$i,
            'address' =>  'Damascus, Airplane Street , IT College , Internet_room',
        ]);
       }

       $theatreEmployee = User::get()
                    ->where('id', 3)
                    ->first();
        $theatreEmployee->addRole('theatre-employee');

        $libraryEmployee = User::get()
                    ->where('id', 4)
                    ->first();
        $libraryEmployee->addRole('library-employee');

        $activityEmployee = User::get()
                    ->where('id', 5)
                    ->first();
        $activityEmployee->addRole('activity-employee');

        $teacher = User::get()
                    ->where('id', 6)
                    ->first();
        $teacher->addRole('teacher');


       // General Report Seeder :
       $this->call(GeneralReportSeeder::class);

       // Rating Seeder :

       $this->call(RatingSeeder::class);



    }
}
