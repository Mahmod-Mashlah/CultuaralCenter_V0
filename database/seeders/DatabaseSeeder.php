<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Department Seeder :
        $this->call(DepartmentSeeder::class);

        // Book Seeder :
        $this->call(BookSeeder::class);

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

       for ($i=1; $i <= 10 ; $i++) {
        \App\Models\User::factory()->create([
            'name' => 'a'."$i",
            'type' => 'user',
            'email' => 'a'."$i".'@gmail.com',
            'password' => Hash::make('password'),
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
