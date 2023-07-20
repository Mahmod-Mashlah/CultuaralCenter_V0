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

        TypePlay::factory()->create([
            'id' => '2',
            'type' => 'Fantasy',
                ]);

            TypePlay::factory()->create([
                'id' => '3',
                'type' => 'Musical',
                    ]);

            TypePlay::factory()->create([
                'id' => '4',
                'type' => 'Epic',
                    ]);

            TypePlay::factory()->create([
                'id' => '5',
                'type' => 'Drama',
                    ]);

            TypePlay::factory()->create([
                'id' => '6',
                'type' => 'Social',
                    ]);

            TypePlay::factory()->create([
                'id' => '7',
                'type' => 'Satire',
                    ]);

            TypePlay::factory()->create([
                'id' => '8',
                'type' => 'Modern',
                    ]);
    }
}
