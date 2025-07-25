<?php
// filepath: database/seeders/TagSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Factory as Faker;

class TagSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->word;    
            Tag::firstOrCreate(['name' => $name], [
                'name' => $name,
            ]);
        }
    }
}