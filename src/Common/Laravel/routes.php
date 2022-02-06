<?php

/**
 * prefix admin/common
 * as admin.common.
 */

use Illuminate\Support\Facades\Route;

Route::get('/dir', [DirController::class, 'dir'])->name('dir');