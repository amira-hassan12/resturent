<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'user_id',
        'date',
        'time',
        'phone',
        'meal_id',
        'small_meal',
        'medium_meal',
        'large_meal',
        'body',
        'status'];
    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
    public function meal(){
        return $this->belongsTo(Meal::class,'meal_id');

    }
}
