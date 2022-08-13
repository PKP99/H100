<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutritionist extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'photo',
        'experience',
        'Accountno',
        'ifsc_code',
        'bank_name',
        'ex_id',
        'type',
        'Degree',
        'Details',
        'mobile_no'
    ];
}
