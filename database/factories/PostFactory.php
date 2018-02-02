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

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraphs(4, true),
        'user_id' => 1,
        # pulls in random picture, puts in in storage and returns the filename as imgname
        'imgname' => $faker->image('storage/app/public/images/news', 800, 600, '', false)
        # loops through existing images and returns the filename as imgname
        // 'imgname' => random_pic()
    ];
});

function random_pic($dir = 'storage/app/public/images/news')
{
    $files = glob($dir . '/*.*');
    $filePath = array_rand($files);
    $fileName = ltrim(strrchr($files[$filePath], '/'), '/');
    return $fileName;
}