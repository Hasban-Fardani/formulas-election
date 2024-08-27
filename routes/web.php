<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login', 301);

Auth::routes();

Route::get('/home', App\Http\Controllers\HomeController::class)->name('home');
Route::middleware('can:admin')->group(function () {
    
});