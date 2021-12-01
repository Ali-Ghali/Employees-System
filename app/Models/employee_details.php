<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_employee',
        'study_org',
        'type_of_certif',
        'study_type',
        'study_place',
        'note',
        'user',
        

    ];
}
