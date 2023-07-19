<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 9 ; $i++) {
            \App\Models\Plan::factory()->create([

                'id' => "$i",
                'date' => "2023-"."$i-".("$i"+1),
                'start_time' => "0$i:".("0".($i+1).":00"),
                'end_time' =>  "0".($i+1).":".("0".($i+2).":00"),
                'min_activities' => $i*3,
                'max_activities' => $i*10,
                'min_lectures' => $i*5,
                'max_lectures' => $i*6,
                'min_plays' => $i*4,
                'max_plays' => $i*5,
            ]);


    }
}

}
