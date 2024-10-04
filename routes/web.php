<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login', 301);

Auth::routes();

Route::middleware('auth')->group(function () {

    // User Routes
    Route::name('user.')->group(function () {
        Route::get('/home', App\Http\Controllers\User\HomeController::class)
            ->name('home');
        Route::get('election/{election}', [App\Http\Controllers\User\VotingController::class, 'show'])
            ->name('election.show');
        Route::get('election/{election}/results', [App\Http\Controllers\User\VotingController::class, 'results'])
            ->name('election.results');
        Route::post('vote/{candidate}', [App\Http\Controllers\User\VotingController::class, 'vote'])
            ->name('vote');
    });

    // Admin Routes
    Route::middleware('can:admin')->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\DasboardController::class)
            ->name('dashboard');
        Route::resource('election', App\Http\Controllers\Admin\ElectionController::class)
            ->except(['create']);
        Route::resource('user', App\Http\Controllers\Admin\UserController::class);
        Route::resource('candidate', App\Http\Controllers\Admin\CandidateController::class)
            ->only(['store', 'update', 'destroy']);
    });
});
