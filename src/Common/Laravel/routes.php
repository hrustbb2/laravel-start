<?php

/**
 * prefix admin/common
 * as admin.common.
 */

use Illuminate\Support\Facades\Route;
use Src\Common\Laravel\Controllers\FilesBrowserControllers;

Route::post('/dir', [FilesBrowserControllers::class, 'dir'])->name('filesBrowser.dir');