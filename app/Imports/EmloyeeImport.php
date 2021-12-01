<?php

namespace App\Imports;

use App\Models\employees;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EmloyeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new employees([
            'first_name' => $row['first_name'],
            'last_name'    => $row['last_name'],
            'father_name'     => $row['father_name'],
            'mother_name'    => $row['mother_name'],
            'mother_nick_name'     => $row['mother_nick_name'],
            'soishal_state'    => $row['soishal_state'],
            'birth_date'     => $row['birth_date'],
            'natual_number'    => $row['natual_number'],
            'study_org'     => $row['study_org'],
            'type_of_certif'    => $row['type_of_certif'],
            'study_type'     => $row['study_type'],
            'study_place'     => $row['study_place'],
            'live_place'    => $row['live_place'],
            'state'    => $row['state'],
            'address'    => $row['address'],
            'mobile_number'    => $row['mobile_number'],
            'phone_number'    => $row['phone_number'],
            'note'    => $row['note'],
            
            
        ]);
    }
}
