<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class NewsSource extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_sources')->insert($this->getData());
    }


    public function getData()
    {

        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                'title' => $faker->jobTitle(),
                'url' => $faker->text(),
                'category_id' => rand(1, 5),
            ];
        }

        return $data;
    }
}

// php artisan db:seed --class=NewsSource