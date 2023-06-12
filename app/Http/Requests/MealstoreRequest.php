<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealstoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:40',
            'description'=>'required|min:3|max:400',
            'small_meal_price'=>'required|numeric',
            'med_meal_price'=>'required|numeric',
            'large_meal_price'=>'required|numeric',
            'category'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,svg'
        ];
    }
}
