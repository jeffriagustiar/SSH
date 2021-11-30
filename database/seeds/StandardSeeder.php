<?php

use Illuminate\Database\Seeder;
use App\Standard;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Standard::truncate();

        $csv = fopen(base_path("database/data/data1.csv"), "r");

        $f1 = true;
        while(($data = fgetcsv($csv,10000000,";")) !== FALSE){
            if(!$f1)
            {
                Standard::create([
                    'kode_standar' => $data[0],
                    'nama_standar' => $data[1],
                    'tipe' => $data[2],
                    'kelompok' => $data[3]
                ]);
            }
            $f1 = false;
        }
        fclose($csv);
    }
}
