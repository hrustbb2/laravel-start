<?php

/**
 * prefix admin/auth
 * as admin.auth.
 */

use Illuminate\Support\Facades\Route;
use Src\Auth\Laravel\Controllers\LoginController;

Route::get('/login-form', [LoginController::class, 'loginForm']);
Route::post('/login-requet', [LoginController::class, 'loginRequest'])->name('loginRequest');