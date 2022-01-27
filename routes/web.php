<?php

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

use App\Http\Controllers\ContentController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContentController::class, 'index']);
Route::post('/read', [ContentController::class, 'read']);

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/add', [AdminController::class, 'add']);
Route::post('/admin/read', [AdminController::class, 'read']);
Route::post('/admin/readRegiao', [AdminController::class, 'readRegiao']);