<?php

/**
 * prefix admin/json-objects
 * as admin.jsonObjects.
 */

use Illuminate\Support\Facades\Route;
use Src\JsonObjects\Laravel\Controllers\DirController;

Route::get('/dir', [DirController::class, 'dir'])->name('dir');