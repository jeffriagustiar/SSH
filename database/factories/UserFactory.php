<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Profiles;

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

$factory->define(User::class, function (Faker $f) {
    return [
        'email' => $f->unique()->email,
        'password' => Hash::make('123456'),
        'created_at' => date_create()
    ];
});

$factory->define(Profiles::class, function (Faker $f) {
    return [
        'nama' => $f->name,
        'phone' => $f->phoneNumber,
        'kelamin' => 'Male',
        'alamat' => $f->address,
        'users_id' => User::orderByDesc('created_at')->first()->id,
        'created_at' => date_create()
    ];
});
