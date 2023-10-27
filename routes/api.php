<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('wilayah/{kode}/{panjang}', [ApiController::class, 'wilayah']);
Route::post('tes', [ApiController::class, 'tes']);

Route::prefix('v1')->group(function () {
    Route::post('post_data', [ApiController::class, 'post_data']);
});

