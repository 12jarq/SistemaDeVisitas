<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Order;
use App\Models\OrderLineItem;
use App\Models\Product;
use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(OrderLineItem::class, function ( Faker $faker ) {
    $unitPrice = rand(200, 100);
    $quantity  = rand(1, 5);
    return [
        'shop_id'          => Shop::get()->pluck('id')->random(),
        'order_id'         => Order::get()->pluck('id')->random(),
        'product_id'       => Product::get()->pluck('id')->random(),
        'quantity'         => $quantity,
        'unit_price'       => $unitPrice,
        'discounted_price' => 0.00,
        'item_total'       => $unitPrice * $quantity,
    ];
});
