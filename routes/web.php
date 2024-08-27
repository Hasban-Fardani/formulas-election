<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login', 301);

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', App\Http\Controllers\HomeController::class)->name('home');
    
    Route::get('election/{election}', [App\Http\Controllers\VotingController::class, 'election'])->name('election.show-public');
    Route::get('election/{election}/results', [App\Http\Controllers\VotingController::class, 'results'])->name('election.results');
    Route::post('vote/{candidate}', [App\Http\Controllers\VotingController::class, 'vote'])->name('vote');

    Route::middleware('can:admin')->prefix('/admin')->group(function () {
        Route::resource('election', App\Http\Controllers\ElectionController::class);
    });
});