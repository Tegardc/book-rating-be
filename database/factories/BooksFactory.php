<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\CategoryBooks;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'category_id' => $this->faker->numberBetween(1, 3000),
            'author_id' => $this->faker->numberBetween(1, 1000),

            //
        ];
    }
}
