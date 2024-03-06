<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\LocationStatus;
use App\Models\Location;
use App\User;
use Faker\Generator as Faker;

$factory->define(Location::class, function ( Faker $faker ) {
    return [
        'name'         => $faker->state,
        'slug'         => $faker->unique()->slug(),
        'order'        => 1,
        'status'       => LocationStatus::ACTIVE,
        'creator_type' => User::class,
        'editor_type'  => User::class,
        'creator_id'   => 1,
        'editor_id'    => 1
    ];
});
