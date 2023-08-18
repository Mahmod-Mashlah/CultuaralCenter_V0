<?php

namespace Database\Seeders;

use App\Models\GeneralReport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First way :

        $randomUser = User::inRandomOrder()->first();
        // dd($randomUser->name);

        // Second way :

        // $randomName = DB::table('users')->inRandomOrder()->first()->name;
        // dd($randomName);

        for ($i=1; $i <= 10 ; $i++)
        {

                GeneralReport::factory()->create([


                    'name'               =>  'General Report #'.$i ,
                    'teacher_name'       =>  $randomUser->name,
                    'attenders_count'    => rand(1, 100)   ,
                    'attenders_percent'  => rand(20, 100)   ,
                    'sessions_count'     => rand(1, 30)   ,

                ]);

        }
    }
}
