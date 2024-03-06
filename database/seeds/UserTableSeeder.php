<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'     => 'John',
            'last_name'      => 'Doe',
            'username'       => 'admin',
            'email'          => 'admin@example.com',
            'phone'          => '+15005550006',
            'address'        => 'Dhaka, Bangladesh',
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'first_name'     => 'Reception',
            'last_name'      => 'Demo',
            'username'       => 'reception',
            'email'          => 'reception@example.com',
            'phone'          => '+15005550008',
            'address'        => 'Dhaka, Bangladesh',
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::find(3);
        $user->assignRole($role->name);
    }
}
