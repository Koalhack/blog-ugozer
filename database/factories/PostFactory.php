<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $title = fake()->sentence();
        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "content" => fake()->paragraph(10),
            "category_id" => fake()->randomElement(Category::all())['id'],
            "image_id" => fake()->randomElement(Image::all())['id']
        ];
    }
}
