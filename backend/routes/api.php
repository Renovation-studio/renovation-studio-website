<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/signin', [AuthController::class, 'signin'])->name('signin');

Route::post('/auth/signout', [AuthController::class, 'signout'])->name('signout');

Route::post('/auth/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/auth/restore-password', [AuthController::class, 'restorePassword'])->name('restore-password');



Route::post('/check-email', [RegisterController::class, 'checkEmail']);
Route::post('/check-phone', [RegisterController::class, 'checkPhone']);
Route::post('/register', [RegisterController::class, 'create']);

