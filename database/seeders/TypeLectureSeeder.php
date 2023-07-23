<?php

namespace Database\Seeders;

use App\Models\TypeLecture;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Types :
        // Lecture Types :
        // Cultural', 'Educational', 'Religious', 'Social', 'Economic', 'Scientific', 'Philosophical', 'Technical', 'Historical', 'Political'

        TypeLecture::factory()->create([
            'id' => '1',
            'type' => 'Cultural',
        ]);

        TypeLecture::factory()->create([
            'id' => '2',
            'type' => 'Economic',
        ]);

        TypeLecture::factory()->create([
            'id' => '3',
            'type' => 'Educational',

        ]);

        TypeLecture::factory()->create([
            'id' => '4',
            'type' => 'Historical',
        ]);

        TypeLecture::factory()->create([
            'id' => '5',
            'type' => 'Philosophical',
        ]);

        TypeLecture::factory()->create([
            'id' => '6',
            'type' => 'Political',
        ]);

        TypeLecture::factory()->create([
            'id' => '7',
            'type' => 'Religious',

        ]);

        TypeLecture::factory()->create([
            'id' => '8',
            'type' => 'Scientific',

        ]);

        TypeLecture::factory()->create([
            'id' => '9',
            'type' => 'Social',
        ]);

        TypeLecture::factory()->create([
            'id' => '10',
            'type' => 'Technical',
        ]);
    }
}
