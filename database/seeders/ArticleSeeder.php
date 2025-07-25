<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Article::create([
                'slug' => $faker->slug,
                'title' => $faker->sentence,
                'body' => $faker->paragraphs(5, true),
            ]);
        }
    }
}