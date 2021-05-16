<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\sewaController;
use App\Http\Controllers\BayarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'home']);

//MAGIC, DO NOT TOUCH
Route::middleware(['auth:sanctum','verified'])->get('/dashboardx',function (){
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard',[PagesController::class, 'dashboard']);


Route::resource('sewa', SewaController::class);
Route::resource('pembayaran', BayarController::class);

Route::get('vue/{any}', function () {
    return view('app');
})->where('any', '.*')->middleware(['auth']);


