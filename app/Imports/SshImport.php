<?php

namespace App\Imports;

use App\Ssh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SshImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ssh([
            'uraian' => $row[0],
            'spek' => $row[1],
            'satuan' => $row[2],
            'harga' => $row[3],
        ]);
    }
}
