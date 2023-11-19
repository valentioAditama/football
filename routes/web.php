<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MatchGameController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/club', [ClubController::class, 'index'])->name('club.index');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');
Route::put('/club/{club}', [ClubController::class, 'update'])->name('club.update');
Route::delete('/club/{club}', [ClubController::class, 'destroy'])->name('club.delete');

Route::get('/score', [MatchGameController::class, 'index'])->name('score.index');
Route::post('/score', [MatchGameController::class, 'store'])->name('score.store');
Route::put('/score/{score}', [MatchGameController::class, 'update'])->name('score.update');
Route::delete('/score/{score}', [MatchGameController::class, 'destroy'])->name('score.delete');
