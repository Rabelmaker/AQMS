<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/login', [AdminController::class, "login"])->name("login");
Route::post('/login', [AdminController::class, "post_login"])->name("post_login");
Route::get('/akun', [AdminController::class, "akun"])->name("akun");


Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::get('/logout', [AdminController::class, "logout"])->name("logout");
    Route::get('/', [AdminController::class, "dashboard"])->name("dashboard");

    Route::prefix('parameter')->group(function () {
        $x = "parameter";
        Route::get('/', [AdminController::class, $x])->name($x);
        Route::post('/', [AdminController::class, "post_$x"])->name("post_$x");
        Route::get('/add', [AdminController::class, "add_$x"])->name("add_$x");
        Route::get('/edit/{id}', [AdminController::class, "edit_$x"])->name("edit_$x");
        Route::get('/delete/{id}', [AdminController::class, "delete_$x"])->name("delete_$x");
    });

    Route::prefix('alat')->group(function () {
        $x = "alat";
        Route::get('/', [AdminController::class, $x])->name($x);
        Route::post('/', [AdminController::class, "post_$x"])->name("post_$x");
        Route::get('/add', [AdminController::class, "add_$x"])->name("add_$x");
        Route::get('/edit/{id}', [AdminController::class, "edit_$x"])->name("edit_$x");
        Route::get('/delete/{id}', [AdminController::class, "delete_$x"])->name("delete_$x");
    });


});

