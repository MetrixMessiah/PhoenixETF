<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    AdminLoginController,
    AgentLoginController,
    UserLoginController,
    RegisterController,
    ForgotPasswordController,
    ResetPasswordController,
    VerificationController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Admin Routes
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login']);

    // Agent Routes
    Route::get('/agent/login', [AgentLoginController::class, 'showLoginForm'])->name('agent.login');
    Route::post('/agent/login', [AgentLoginController::class, 'login']);

    // User Routes
    Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Password Reset Routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');
    
    // Email Verification Routes
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    // Admin Routes
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Agent Routes
    Route::middleware(['auth', 'role:agent'])->prefix('agent')->group(function () {
        Route::get('/dashboard', function () {
            return view('agent.dashboard');
        })->name('agent.dashboard');
    });

    // User Routes
    Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
    });
}); 