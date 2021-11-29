<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    $csv = fopen(base_path("database/data/test2.csv"), "r");

    $f1 = true;
    while(($data = fgetcsv($csv,10000000,";")) !== FALSE){
        if(!$f1)
        {
            return [
                'kode_rekening' => $data[0],
                'nama_rekening' => $data[1],
                'pendapatan' => $data[2],
                'belanja' => $data[3],
                'pembiayaan' => $data[4]
            ];
        }
        $f1 = false;
    }
    fclose($csv);
});
