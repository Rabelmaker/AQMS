<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('wilayah/{kode}/{panjang}', [ApiController::class, 'wilayah']);
Route::post('tes', [ApiController::class, 'tes']);

Route::prefix('v1')->group(function () {
    Route::post('post_data', [ApiController::class, 'tes']);
    Route::post('registrasi', [ApiController::class, 'registrasi']);
    Route::post('login', [ApiController::class, 'login']);
    Route::get('alat', [ApiController::class, 'load_alat']);
    Route::get('parameter', [ApiController::class, 'load_parameter']);
    Route::post('edit_akun', [ApiController::class, 'edit_akun']);
});

