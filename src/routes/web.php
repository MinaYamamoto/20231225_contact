<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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


Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::middleware('auth')->group(function()
{
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    // 任意パラメータ複数指定・・・？？
    Route::get('/admin/exportcsv/{category_id?}/{gender?}/{date?}/{keyword?}', 'App\Http\Controllers\AdminController@exportCsv')->name('admin.exportcsv');
});