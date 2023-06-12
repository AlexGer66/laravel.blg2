<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     

        return [
            'title' => fake()->words(2, true),
            'description' => fake()->words(7, true),
            'content' => fake()->paragraph(2),
            'category_id' => fake()->randomDigit(),
            'views' => fake()->numberBetween(0, 100),
            'thumbnail' => fake()->randomNumber(5, true) . '.jpg'
            
        ];
    }
}
//
/* Полные тексты
	id 	title 	slug 	description 	content 	category_id 	views 	thumbnail 	created_at 	updated_at */