<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'description' => fake()->text(255,),
            'cover_path' => 'images/9ikpp3QhZBxinK7J684VzjYn38U6Hl56h4VhEoDs.jpg',
        ];
    }
}
