<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'user_id'    => $this->faker->numberBetween(1,10), // creates a user if none passed
            'title'      => $title,
            'slug'       => \Illuminate\Support\Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 99999),
            'excerpt'    => $this->faker->sentence(15),
            'content'    => $this->faker->paragraphs(5, true),
            'status'     => 'draft',
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status'       => 'published',
            'published_at' => now(),
        ]);
    }
}
