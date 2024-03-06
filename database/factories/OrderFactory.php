<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Libraries\MyString;
use App\Models\Order;
use App\Models\Shop;
use App\User;
use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;

$autoIncrement = autoIncrement();
$factory->define(Order::class, function (Faker $faker) use ($autoIncrement) {
    $total          = rand(5000, 10000);
    $deliveryCharge = rand(50, 100);
    $autoIncrement->next();

    $role = Role::find(2);
    return [
        'user_id'         => User::role($role->name)->get()->pluck('id')->random(),
        'shop_id'         => Shop::get()->pluck('id')->random(),
        'total'           => $total + $deliveryCharge,
        'sub_total'       => $total,
        'delivery_charge' => $deliveryCharge,
        'status'          => OrderStatus::PENDING,
        'payment_status'  => PaymentStatus::UNPAID,
        'paid_amount'     => 0.00,
        'address'         => $faker->address,
        'payment_method'  => PaymentMethod::CASH_ON_DELIVERY,
        'mobile'          => $faker->phoneNumber,
        'lat'             => $faker->latitude,
        'long'            => $faker->longitude,
        'misc'            => json_encode(['order_code' => 'ORD-' . MyString::code($autoIncrement->current())]),
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
