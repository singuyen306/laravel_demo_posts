<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'title' => $faker->sentence(5),
        'description' => $faker->text(200),
        'body' => $faker->text(),
        'cover' => $faker->imageUrl(),
        'approved' => rand(0, 1)
    ];
});