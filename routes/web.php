<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function(){
    return view('home');
})->name('home');
Route::get('/about', function(){
    return view('about');
})->name('about');
Route::resource('products', ProductController::class);