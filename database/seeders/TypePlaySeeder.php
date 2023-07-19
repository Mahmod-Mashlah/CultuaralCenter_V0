<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePlaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     // Lecture Types :
                     // 'Pantomime', 'Fantasy' , 'Musical','Pantomime','Epic','Drama','Social ','Satire','Modern'

            \App\Models\TypeLecture::factory()->create([
            'id' => '1',
            'type' => 'Pantomime',
        ]);

        \App\Models\TypeLecture::factory()->create([
            'id' => '2',
            'type' => 'Fantasy',
                ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '3',
                'type' => 'Musical',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '4',
                'type' => 'Pantomime',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '5',
                'type' => 'Epic',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '6',
                'type' => 'Drama',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '7',
                'type' => 'Social',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '8',
                'type' => 'Satire',
                    ]);

            \App\Models\TypeLecture::factory()->create([
                'id' => '9',
                'type' => 'Modern',
                    ]);
    }
}
