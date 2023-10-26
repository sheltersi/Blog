<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' =>$this->faker->sentence,
            'excerpt' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(2)) . '</p>' ,
            'slug' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}