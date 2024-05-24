<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        //INFO: Detete all uploads
        Storage::disk('public')->deleteDirectory('uploads');
        echo "Uploads successfully deleted!\n";

        //INFO: create new fakes (categories, images and posts)
        Category::factory(10)->create();
        Image::factory(10)->create();
        Post::factory(15)->create();
    }
}
