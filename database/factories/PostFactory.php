<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText($faker->numberBetween(10,80)),
        'image' =>  'https://fakeimg.pl/640x480/ffffff,128/333333,255/?text=Post&font=lobster',
        'user_id' => DB::table('users')->inRandomOrder()->first()->id
    ];
});
