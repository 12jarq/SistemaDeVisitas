<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Location;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ShopProduct::class, function ( Faker $faker ) {

    return [
        'shop_id'      => Shop::get()->pluck('id')->random(),
        'product_id'   => Product::get()->pluck('id')->random(),
        'unit_price'   => rand(10, 500),
        'quantity'     => rand(500, 600),
        'creator_type' => 'App\User',
        'creator_id'   => User::get()->pluck('id')->random(),
        'editor_type'  => 'App\User',
        'editor_id'    => User::get()->pluck('id')->random(),
    ];
});
