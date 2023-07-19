<?php

namespace Database\Seeders;

use App\Models\TypePlay;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypePlaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     // PlaTypePlay Types :
                     // 'Pantomime', 'Fantasy' , 'Musical','Pantomime','Epic','Drama','Social ','Satire','Modern'

            TypePlay::factory()->create([
            'id' => '1',
            'type' => 'Pantomime',
        ]);

        \App\Models\TypePlay::factory()->create([
            'id' => '2',
            'type' => 'Fantasy',
                ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '3',
                'type' => 'Musical',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '4',
                'type' => 'Pantomime',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '5',
                'type' => 'Epic',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '6',
                'type' => 'Drama',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '7',
                'type' => 'Social',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '8',
                'type' => 'Satire',
                    ]);

            \App\Models\TypePlay::factory()->create([
                'id' => '9',
                'type' => 'Modern',
                    ]);
    }
}
