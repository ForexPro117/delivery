<?php

use App\Http\Controllers\AnnController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::get('/', [AnnController::class, 'home'])
    ->name('home');

Route::get('/announcement',[AnnController::class, 'create'])
    ->name('ann');
Route::Post('/announcement',[AnnController::class, 'store'])
->name('ann');
Route::get('/announcement/{id}',[AnnController::class, 'watch']);
Route::Post('/search',[AnnController::class, 'search']);

Route::get('/history',[AnnController::class, 'getHistory']);
Route::Post('/delete',[AnnController::class, 'delete']);

require __DIR__ . '/auth.php';
