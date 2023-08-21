<?php

namespace Database\Seeders;

use App\Models\DayType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DayType::factory()->create([
            'id' => '1',
            'name' => 'Saturday',
        ]);

         DayType::factory()->create([
            'id' => '2',
            'name' => 'Sunday',
        ]);

         DayType::factory()->create([
            'id' => '3',
            'name' => 'Monday',

        ]);

         DayType::factory()->create([
            'id' => '4',
            'name' => 'Tuesday',
        ]);

         DayType::factory()->create([
            'id' => '5',
            'name' => 'Wednesday',
        ]);

         DayType::factory()->create([
            'id' => '6',
            'name' => 'Thursday',
        ]);

         DayType::factory()->create([
            'id' => '7',
            'name' => 'Friday',

        ]);
    }
}
