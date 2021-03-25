<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cells;
use Faker\Generator as Faker;

$factory->define(Cells::class, function (Faker $faker) {
    return [
        'description'  => $faker->paragraph,
        'row_id' => function(){
            return factory(\App\Rows::class)->create()->id;
        },
        'column_id' => function(){
            return factory(\App\Columns::class)->create()->id;
        },
    ];
});
