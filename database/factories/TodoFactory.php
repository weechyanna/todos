<?php

use Faker\Generator as Faker;
use App\Todo;


$factory->define(Todo::class, function (Faker $faker) {
    return [
      "title" => $faker->sentence(2),
      "completed" => false,
      "user_id" => function(){
        return factory(App\User::class)->create()->id;

      // numberBetween($min=0, $max=1)
      }
    ];
});
