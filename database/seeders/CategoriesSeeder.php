<?php

namespace Database\Seeders;

use Faker\Factory;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {

            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(255),
            ];
        }

        return $data;
    }
}

// php artisan db:seed --class=CategoriesSeeder