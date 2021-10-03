<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricechart extends Model
{
    use HasFactory;

    protected $fillable = [
        'ex_id',
        'title',
        'description',
        'rate',
    ];
}
