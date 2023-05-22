<?php

namespace App\Exports;

use App\Item;
use App\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventarioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Item::all();
    // }
    public function view(): View
    {
        $items = Item::all();
        return view('inventario.reporteexcel')->with('items', $items);
    }
}
