<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/register',                            [AuthController::class, 'register'])->name('auth.register');
Route::post('/login',                               [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout',                              [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/forgot',                         [AuthController::class, 'forgotPassword'])->name('auth.forgot');
Route::post('/auth/reset',                          [AuthController::class, 'resetPassword'])->name('auth.reset');
Route::post('/auth/verify',                         [AuthController::class, 'verify'])->name('auth.verify');
Route::post('/auth/refresh',                        [AuthController::class, 'refresh'])->name('auth.refresh');
