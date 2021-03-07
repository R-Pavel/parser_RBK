<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence(3),
        'description' => $this->faker->paragraph(1),
        'price' => $this->faker->randomFloat($maxDecimal = 2, $min = 3, $max = 100),
        'stock' => $this->faker->numberBeetwen(1,10),
        'status' => $this->faker->randomElement(['avalible', 'unavalible']),
    ];
});
