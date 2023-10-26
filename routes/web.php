<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('ui.dashboard');
});

Route::get('/akun', function () {
    return view('ui.akun.index');
});

Route::get('/slide', function () {
    return view('ui.slide.index');
});


