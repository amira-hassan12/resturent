<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meal extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'small_meal_price',
        'med_meal_price',
        'large_meal_price',
        'category',
        'image'

    ];
}
