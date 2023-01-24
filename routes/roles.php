<?php

use App\Http\Controllers\RolesController;
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

Route::middleware('jwt.auth')->get('/roles',                                   [RolesController::class, 'browse'])->name('system.roles.role.browse');
Route::middleware('jwt.auth')->get('/roles/{role}',                            [RolesController::class, 'read'])->name('system.roles.role.read');
Route::middleware('jwt.auth')->post('/roles/{role}/edit',                      [RolesController::class, 'edit'])->name('system.roles.role.edit');
Route::middleware('jwt.auth')->post('/roles/add',                              [RolesController::class, 'add'])->name('system.roles.role.add');
Route::middleware('jwt.auth')->post('/roles/{role}/delete',                    [RolesController::class, 'delete'])->name('system.roles.role.delete');