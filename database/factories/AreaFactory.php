<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\AreaStatus;
use App\Models\Area;
use App\Models\Location;
use App\User;
use Faker\Generator as Faker;

$factory->define(Area::class, function ( Faker $faker ) {
    return [
        'name'         => $faker->city,
        'slug'         => $faker->unique()->slug,
        'location_id'  => Location::get()->pluck('id')->random(),
        'order'        => 1,
        'status'       => AreaStatus::ACTIVE,
        'creator_type' => User::class,
        'editor_type'  => User::class,
        'creator_id'   => 1,
        'editor_id'    => 1
    ];
});
