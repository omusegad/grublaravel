<?php

namespace App\Imports;

use App\CorporateTempUsers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TemporaryImports implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CorporateTempUsers([
            'fname'          => $row[0],
            'lname'          => $row[1],
            'phoneNumber'    => $row[2],
            'email'          => $row[3], 
        ]);
    }
     /**
     * @return int
     */
    public function startRow(): int
    {
        return 1;
    }

  
}
