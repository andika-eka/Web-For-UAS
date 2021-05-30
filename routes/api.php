<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SewaController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\bayarController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('sewa', SewaController::class);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::resource('bayar', bayarController::class);
