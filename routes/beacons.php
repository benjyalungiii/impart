<?php

use App\Http\Controllers\BeaconsController;
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

Route::middleware('jwt.auth')->get('/beacons',                             [BeaconsController::class, 'browse'])->name('beacons.beacon.browse');
Route::middleware('jwt.auth')->get('/beacons/{beacon}',               [BeaconsController::class, 'read'])->name('beacons.beacon.read');
Route::middleware('jwt.auth')->post('/beacons/{beacon}/edit',               [BeaconsController::class, 'edit'])->name('beacons.beacon.edit');
Route::middleware('jwt.auth')->post('/beacons/add',                         [BeaconsController::class, 'add'])->name('beacons.beacon.add');
Route::middleware('jwt.auth')->post('/beacons/{beacon}/delete',             [BeaconsController::class, 'delete'])->name('beacons.beacon.delete');
