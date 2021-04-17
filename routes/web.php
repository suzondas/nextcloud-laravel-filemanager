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

Route::get('/', [\App\Http\Controllers\webDavController::class, 'index'])->name('index');
Route::get('/delete', [\App\Http\Controllers\webDavController::class, 'delete'])->name('delete');
Route::post('/newFile', [\App\Http\Controllers\webDavController::class, 'newFile'])->name('newFile');
Route::post('/newFolder', [\App\Http\Controllers\webDavController::class, 'newFolder'])->name('newFolder');
Route::get('/getFile', [\App\Http\Controllers\webDavController::class, 'getFile'])->name('getFile');

