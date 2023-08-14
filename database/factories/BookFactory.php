<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $fileName = $this->faker->colorName() . '.jpg';
        return [
            'name' => $this->faker->name(),
            'status' => $this->faker->numberBetween(1,4),
            'author' => $this->faker->name(),
            'publication' => $this->faker->name(),
            'read_at' => $this->faker->date(),
            'note' => $this->faker->realText(),
            // 'image' => $fileName,
        ];
    }
}
