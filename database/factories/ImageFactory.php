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
        $fakeImagePath = UploadedFile::fake()->image('thumbnail.jpg', 600, 400)->store('uploads', 'public');
        return [
            "name" => basename($fakeImagePath),
            "path" => $fakeImagePath
        ];
    }
}
