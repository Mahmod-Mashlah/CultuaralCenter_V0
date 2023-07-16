<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

       for ($i=1; $i <= 10 ; $i++) {
        \App\Models\User::factory()->create([
            'name' => 'a'."$i",
            'email' => 'a'."$i".'@gmail.com',
            'password' => Hash::make('password'),
        ]);
       }

        \App\Models\User::factory()->create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
