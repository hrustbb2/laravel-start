<?php

/**
 * prefix admin/first-module
 * as admin.firstModule.
 */

use Illuminate\Support\Facades\Route;
use Src\FirstModule\Laravel\Controllers\MainController;

Route::get('/main', [MainController::class, 'main']);