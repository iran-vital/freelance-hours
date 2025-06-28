<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'ends_at' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'tech_stack' => $this->faker->randomElements(
                ['nodejs', 'react', 'javascript', 'vite', 'nextjs'],
                $count = rand(1, 4)
            ),
            'created_by' => \App\Models\User::factory(),
            
        ];
    }
}
