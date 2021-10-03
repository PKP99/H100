<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Food extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

     protected $fillable = [
        'name',
        'calorific_value',
        'type',
        'measurement_type',
    ];
}
