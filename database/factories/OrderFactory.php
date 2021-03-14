<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $this->faker->randomElement(['pending','paid', 'shipped']),
        'amount' => $this->faker->numberBetween(1,10),
        'payed_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null)
    ];
});
