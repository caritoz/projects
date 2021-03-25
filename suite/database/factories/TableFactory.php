<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Table;
use Faker\Generator as Faker;

$factory->define(Table::class, function (Faker $faker) {
    return [
        'name'  => $faker->unique()->word(),
        'project_id' => function(){
            return factory(\App\Project::class)->create()->id;
        },
    ];
});
