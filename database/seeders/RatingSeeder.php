<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersCount = User::all()->count() ;
        for ($i=1; $i <=  $usersCount; $i++) {
        Rating::factory()->create([
            'user_id'=> $i,
            'rating' =>  rand(1, 5)  ,
        ]);
         }
    }
}
