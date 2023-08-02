<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20 ; $i++) {
            Department::factory()->create([

                'name' => "Department#"."$i",
                'rows_count' => $i*5,
                'max_row_books' => $i*10,

            ]);


    }
}

}
