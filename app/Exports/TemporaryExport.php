<?php

namespace App\Exports;

use App\CorporateTempUsers;
use Maatwebsite\Excel\Concerns\FromCollection;

class TemporaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CorporateTempUsers::all();
    }
}
