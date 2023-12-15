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
Route::group(['middleware' => ['web']], function () {
    Route::post('/login', [AuthController::class, 'signin'])->name('signin');

    Route::post('/logout', [AuthController::class, 'signout'])->name('signout');

    Route::post('/restore-password', [AuthController::class, 'restorePassword'])->name('restore-password');
});
Route::post('/auth/signup', [AuthController::class, 'signup'])->name('signup');



Route::post('/check-email', [RegisterController::class, 'checkEmail']);
Route::post('/check-phone', [RegisterController::class, 'checkPhone']);
Route::post('/register', [RegisterController::class, 'create']);

