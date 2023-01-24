<?php

use App\Http\Controllers\CollaborationsController;
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

Route::middleware('jwt.auth')->get('/collaborations',                                                   [CollaborationsController::class, 'browse'])->name('collaborations.collaboration.browse');
Route::middleware('jwt.auth')->get('/collaborations/users/{user}/beacons/{beacon}/attach',               [CollaborationsController::class, 'attach'])->name('collaborations.collaboration.attach');
Route::middleware('jwt.auth')->post('/collaborations/users/{user}/beacons/{beacon}/detach',              [CollaborationsController::class, 'detach'])->name('collaborations.collaboration.detach');
