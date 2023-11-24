<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

      

        return [
            'completed' => fake()->boolean(50),
            'date_start' => fake()->dateTimeBetween('now', '+ 20days'),
            'date_limit' => fake()->dateTimeBetween('+21 days', '+40days'),
            'name' =>  fake()->name(),
        ];

     
    }
}
