<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralReport>
 */
class GeneralReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            // 'user_id' => User::all()->random()->id ,
            // 'name'   => $this->faker->unique()->sentence(),
            // 'description' => $this->faker->text(),
            // 'priority' =>$this->faker->randomElement(['low','medium','high'])

        // 'name',
        // 'teacher_name',
        // 'attenders_count',
        // 'attenders_percent',
        // 'sessions_count',
        ];
    }
}
