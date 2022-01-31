<?php

namespace Database\Seeders;

use Faker\Factory;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('news')->insert($this->getData($i));
        }
    }

    public function getData($categoryId)
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                'title' => $faker->jobTitle(),
                'slug' => $faker->text(255),
                'author' => $faker->text(5),
                'description' => $faker->text(255),
                'category_id' => $categoryId,

            ];
        }

        return $data;
    }
}

//php artisan db:seed --class=NewsSeeder