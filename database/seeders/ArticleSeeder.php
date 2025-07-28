<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Tag;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $tags = Tag::all();

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence;
            $article = Article::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'body' => $faker->realText(rand(200, 400)),
                'image' => 'https://placehold.co/600x400',
                'user_id' => 1,
            ]);
            $article->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
            sleep(1);    
        }
    }
}