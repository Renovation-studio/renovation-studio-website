<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;



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
Route::get('/elements', [ElementController::class, 'index']);

Route::get('/catalog', [ServicesController::class, 'index']);

Route::get('/catalog/{id}', [ServicesController::class, 'show']);

Route::get('/search', [ServicesController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['web']], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/restore-password', [AuthController::class, 'restorePassword'])->name('restore-password');

    Route::post('/password-reset-token', [AuthController::class, 'requestResetToken'])->name('password-reset-token');

    Route::get('/profile', [AuthController::class, 'getProfile'])->name('profile');
});

Route::get('/email/verify/{id}', [RegisterController::class, 'verify']);

Route::post('/check-email', [RegisterController::class, 'checkEmail']);

Route::post('/check-phone', [RegisterController::class, 'checkPhone']);

Route::post('/register', [RegisterController::class, 'create']);

