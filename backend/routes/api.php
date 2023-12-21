<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\DataFromFormController;
use App\Http\Controllers\LandingController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('get')->group(function () {
    Route::get('cities', [LandingController::class, "citiesGetAction"]);
    Route::get('services', [LandingController::class, "servicesGetAction"]);
    Route::get('reviews', [LandingController::class, "reviewsGetAction"]);
    Route::get('dataFromForm', [LandingController::class, "dataFromFormGetAction"]);
    Route::get('portfolios', [LandingController::class, "portfoliosGetAction"]);
    //Route::post('/feedback', [DataFromFormController::class, "feedback"])->name("data.feedback");
});
