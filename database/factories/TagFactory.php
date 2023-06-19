<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postIds = \App\Models\Post::pluck('id')->all();
        return [
            'name' => fake()->word,
            'post_id' => fake()->randomElement($postIds),

        ];
    }
}
