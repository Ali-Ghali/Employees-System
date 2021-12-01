<?php

namespace App\Imports;

use App\Models\Bulk;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\employees;
use Maatwebsite\Excel\Concerns\FromCollection;
class BulkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return employees::all();
    }
}
