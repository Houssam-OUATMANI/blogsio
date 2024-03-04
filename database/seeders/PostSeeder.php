<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Post::query()->insert([
             [
             "title" => "Un titre",
             "content" => "Un contenu",
             "image_path" => "image.png",
             "user_id" => 1
             ],
             [
                "title" => "Un titre 2",
                 "content" => "Un contenu 2",
                 "image_path" => "image.png",
                 "user_id" => 1
             ]
         ]
         );
    }
}
