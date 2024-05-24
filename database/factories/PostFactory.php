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
        //INFO: Generate fake posts
        //Genreate fake title for 'title' and 'slug' table column
        $title = fake()->sentence();
        return [
            "title" => $title,
            "slug" => Str::slug($title), // Generate slug with the fake title
            "content" => fake()->paragraph(10), // Generate fake paragraph of 10 sentences
            "category_id" => fake()->randomElement(Category::all())['id'], //Select random id from categories table
            "image_id" => fake()->randomElement(Image::all())['id'] // Select random id from images table
        ];
    }
}
