<?php

use Illuminate\Support\Facades\Route;
use App\Providers\AppServiceProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $factory = app()->get(AppServiceProvider::FRONT_FACTORY);
    $page = $factory->getPagesFactory()->createHome();
    return view('home', ['page' => $page]);
})->name('home');