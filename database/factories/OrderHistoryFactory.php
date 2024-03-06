<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderHistory;
use Faker\Generator as Faker;

$factory->define(OrderHistory::class, function ( Faker $faker ) {
    return [
        'order_id'        => Order::get()->pluck('id')->random(),
        'previous_status' => null,
        'current_status'  => OrderStatus::PENDING,
    ];
});
