<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EndServiceController;
use Illuminate\Support\Facades\Route;

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
Route::resource('/', EmployeeController::class);
Route::get('end-service/{id}',[EndServiceController::class,'endServiceForm'])->name('end-service');
Route::post('get-end-service',[EndServiceController::class,'calcEndService'])->name('get-end-service');
