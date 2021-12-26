<?php

namespace App\Exports;

use App\Components;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HspkExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $date , string $date2)
    {
        $this->date = $date;
        $this->date2 = $date2;
    }
    
    public function view() : View
    {
        // return Components::all();
        $com = Components::where('komponen_id','LIKE',"%HSPK%")
                ->whereBetween('created_at',[$this->date,$this->date2])
                ->get();

        return view('pages.hspk.hspk',[
            'com' => $com,
        ]);
    }
}
