<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i <= 20 ; $i++)
        {
                Book::factory()->create([

                    'name' => "book #"."$i",
                    'author' => 'author'."$i",
                    'amount' =>  rand(1, $i*5)  ,
                    'row'    => $i,
                    // 'type'   => "Department#".$faker->numberBetween(1, $i) ,
                    'type' => "Department#".rand(1, $i),

                ]);

        }
    }
}
