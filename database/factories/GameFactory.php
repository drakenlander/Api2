<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'genre' => $this->faker->text(10),
            'developer' => $this->faker->name(),
            'publisher' => $this->faker->lexify('????? Inc.'),
            'is_indie' => $this->faker->boolean(),
            'is_ps' => $this->faker->boolean(),
            'is_xb' => $this->faker->boolean(),
            'is_nin' => $this->faker->boolean(),
            'is_pc' => $this->faker->boolean(),
            'release_date' => $this->faker->dateTimeBetween('-7 years', 'now')
        ];
    }
}
