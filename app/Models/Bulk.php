<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulk extends Model
{
    use HasFactory;
    protected $table = 'bulk';
    protected $fillable = [
        'name', 'email',
    ];
}
