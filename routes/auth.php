<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\BrokerLoginController;
use Illuminate\Support\Facades\Route;

// User Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [UserLoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('login', [UserLoginController::class, 'login']);
});

Route::post('logout', [UserLoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [AdminLoginController::class, 'login']);
    });

    Route::post('logout', [AdminLoginController::class, 'logout'])
        ->middleware('auth:admin')
        ->name('logout');
});

// Broker Authentication Routes
Route::prefix('broker')->name('broker.')->group(function () {
    Route::middleware('guest:broker')->group(function () {
        Route::get('login', [BrokerLoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [BrokerLoginController::class, 'login']);
        Route::get('register', [BrokerLoginController::class, 'showRegistrationForm'])
            ->name('register');
        Route::post('register', [BrokerLoginController::class, 'register']);
    });

    Route::post('logout', [BrokerLoginController::class, 'logout'])
        ->middleware('auth:broker')
        ->name('logout');

    // Password Reset Routes
    Route::get('password/reset', [BrokerLoginController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('password/email', [BrokerLoginController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    Route::get('password/reset/{token}', [BrokerLoginController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('password/reset', [BrokerLoginController::class, 'reset'])
        ->name('password.update');

    // Support Route
    Route::get('support', function () {
        return view('broker.support');
    })->name('support');
}); 