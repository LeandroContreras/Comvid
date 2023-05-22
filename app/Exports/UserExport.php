<?php

namespace App\Exports;

use view;
use App\User;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromView

{
    use Exportable;
    private $data;

    public function view(): View{
        return view('exports.users',['users' => User::get()]);
    }
    /**
     * 
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
