<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ElementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/phone', [PhoneController::class, 'store']);
