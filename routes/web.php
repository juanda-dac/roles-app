<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\IsLogged;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/users');
});

Route::prefix('auth')->group(function (){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'store']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware([IsLogged::class]);
});

Route::middleware([IsLogged::class])->group(function () {
    Route::prefix('users')->group(function(){
        Route::get('/', [DashboardController::class, 'index']);
        Route::post('/add', [DashboardController::class, 'addUser']);
    });
});
