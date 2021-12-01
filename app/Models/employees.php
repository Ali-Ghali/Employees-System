<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{

    use HasFactory;
    protected $table ="employees";
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'mother_nick_name',
        'soishal_state',
        'birth_date',
        'natual_number',
        'study_org',
        'type_of_certif',
        'study_type',
        'study_place',
        'live_place',
        'state',
        'address',
        'mobile_number',
        'phone_number',
        'note',
     

    ];
}
