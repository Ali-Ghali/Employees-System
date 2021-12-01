<?php

namespace App\Exports;

use App\Models\employees;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return employees::all();
    }
}
