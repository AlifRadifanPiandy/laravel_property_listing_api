<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;

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

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/brokers', [BrokersController::class, 'index']);
Route::get('/brokers/{broker}', [BrokersController::class, 'show']);
Route::get('/properties', [PropertiesController::class, 'index']);
Route::get('/properties/{property}', [PropertiesController::class, 'show']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/brokers', BrokersController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/properties', PropertiesController::class)->only(['store', 'update', 'destroy']);
});
