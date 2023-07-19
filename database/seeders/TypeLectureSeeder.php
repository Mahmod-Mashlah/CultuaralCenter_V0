<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Types :
                // Lecture Types :
                     // cultural', 'educational', 'religious', 'social', 'economic', 'scientific', 'philosophical', 'technical', 'historical', 'political'

        \App\Models\TypeLecture::factory()->create([
            'id' => '1',
            'type' => 'cultural',
        ]);

        \App\Models\TypeLecture::factory()->create([
            'id' => '2',
            'type' => 'educational',
               ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '3',
                'type' => 'religious',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '4',
                'type' => 'social',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '5',
                'type' => 'economic',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '6',
                'type' => 'scientific',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '7',
                'type' => 'philosophical',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '8',
                'type' => 'technical',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '9',
                'type' => 'historical',
                   ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '10',
                'type' => 'political',
                   ]);

    }
}
