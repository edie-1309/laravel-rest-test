<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::get('/logout', [AuthenticationController::class, 'logout']);
});
Route::resource('/mahasiswa', MahasiswaController::class);

Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('login');