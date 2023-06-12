<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/frontend/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


//admin
Route::group(
    ['prefix'=>'admin','middleware'=>['auth','admin']],
    function(){

//meals
Route::get('/meals', [App\Http\Controllers\MealController::class, 'index'])->name('meals');
Route::get('/meals/create', [App\Http\Controllers\MealController::class, 'create'])->name('meals.create');
Route::post('/meals/store', [App\Http\Controllers\MealController::class, 'store'])->name('meals.store');
Route::get('/meals/edit/{id}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
Route::put('/meals/update/{id}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');
Route::delete('/meals/delete/{id}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.delete');

//orders
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');

//status
Route::post('/order/status/{id} ', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('order.status');

}); //admin group


//user

