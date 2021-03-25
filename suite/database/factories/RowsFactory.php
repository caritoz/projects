<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rows;
use Faker\Generator as Faker;

$factory->define(Rows::class, function (Faker $faker) {
    return [
        'name'  => $faker->unique()->word(),
        'table_id' => function(){
            return factory(\App\Table::class)->create()->id;
        },
    ];
});
