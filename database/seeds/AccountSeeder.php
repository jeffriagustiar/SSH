<?php

use Illuminate\Database\Seeder;
use App\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::truncate();

        $csv = fopen(base_path("database/data/test2.csv"), "r");

        $f1 = true;
        while(($data = fgetcsv($csv,10000000,";")) !== FALSE){
            if(!$f1)
            {
                Account::create([
                    'kode_rekening' => $data[0],
                    'nama_rekening' => $data[1],
                    'pendapatan' => $data[2],
                    'belanja' => $data[3],
                    'pembiayaan' => $data[4]
                ]);
            }
            $f1 = false;
        }
        fclose($csv);
    }
}
