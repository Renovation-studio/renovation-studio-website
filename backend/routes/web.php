<?php

use App\Http\Controllers\DataFromFormController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\LandingController;
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

Route::post('/feedback', [DataFromFormController::class, "feedback"])->name("data.feedback");
Route::get('/', [LandingController::class, "index"])->name("data.index");
