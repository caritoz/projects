<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Columns;
use Faker\Generator as Faker;

$factory->define(Columns::class, function (Faker $faker) {
    return [
        'name'  => $faker->unique()->word(),
        'table_id' => function(){
            return factory(\App\Table::class)->create()->id;
        },
    ];
});
