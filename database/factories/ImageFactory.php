<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //INFO: Generate fake image and store it in 'public/storage/uploads'
        $fakeImagePath = UploadedFile::fake()->image('thumbnail.jpg', 600, 400)->store('uploads', 'public');
        return [
            "name" => basename($fakeImagePath), // save name
            "path" => $fakeImagePath // save fullPath
        ];
    }
}
