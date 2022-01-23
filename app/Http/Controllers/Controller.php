<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null): array
    {
        $faker = Factory::create();

        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(255),
                'author' => $faker->userName(),
                'created_at' => now(),
            ];
        }

        $data = [];
        for ($i = 1; $i <= 4; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(255),
                'author' => $faker->userName(),
                'created_at' => now(),
            ];
        }

        return $data;
    }

    public function getCategoryNews(?int $id = null): array
    {
        $faker = Factory::create();

        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->text(15),
                'description' => $faker->text(60),
                'author' => $faker->userName(),
                'created_at' => now(),
                'news' => $this->getNews(),
            ];
        }

        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $faker->text(15),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'created_at' => now(),
            ];
        }
        return $data;
    }
}
