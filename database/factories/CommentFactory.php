<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'book_id' => rand(1, Book::count()),
            'title' => fake()->title(),
            'description' => fake()->text(200),
            'grade' => fake()->numberBetween(0, 5),
        ];
    }
}
