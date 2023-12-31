<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\ResultController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('resolution', [ResolutionController::class, 'run']);
Route::get('result', [ResultController::class, 'run']);

// Route::get('test', [Controller::class, 'test']);

Route::get('test', [Controller::class, 'test'])->name('test');
Route::get('start', [Controller::class, 'start']);