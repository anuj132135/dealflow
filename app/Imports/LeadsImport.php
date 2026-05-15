<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'name' => $row[0],
            'email' => $row[1],
            'phone' => $row[2],
            'source' => $row[3],
            'assigned_employee' => $row[4]
            
        ]);
    }
}
