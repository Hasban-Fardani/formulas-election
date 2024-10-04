<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::redirect('/', '/login', 301);

Route::middleware('auth')->group(function () {
    // User Routes
    Route::name('user.')->group(function () {
        Route::get('/home', User\HomeController::class)
            ->name('home');
        Route::get('election/{election}', [User\VotingController::class, 'show'])
            ->name('election.show');
        Route::post('vote/{candidate}', [User\VotingController::class, 'vote'])
            ->name('vote');
    });

    // Admin Routes
    Route::middleware('can:admin')->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', Admin\DasboardController::class)
            ->name('dashboard');
        Route::resource('election', Admin\ElectionController::class)
            ->except(['create']);
        Route::resource('user', Admin\UserController::class);
        Route::resource('candidate', Admin\CandidateController::class)
            ->only(['store', 'update', 'destroy']);
    });
});
