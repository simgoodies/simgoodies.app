<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Subscription::class, function (Faker $faker) {
    return [
        'email'     => 'example@example.org',
        'token'     => '12345ABCDE',
        'confirmed' => false,
    ];
});
