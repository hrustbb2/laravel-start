<?php

use Illuminate\Support\Facades\Route;
use Src\FirstModule\Laravel\Controllers\MainController;

Route::get('/main', [MainController::class, 'main']);