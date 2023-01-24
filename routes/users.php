<?php

use App\Http\Controllers\UsersController;
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

Route::middleware('jwt.auth')->get('/users',                                        [UsersController::class, 'browse'])->name('users.user.browse');
Route::middleware('jwt.auth')->get('/users/{user}',                                 [UsersController::class, 'read'])->name('users.user.read');
Route::middleware('jwt.auth')->post('/users/{user}/edit',                           [UsersController::class, 'edit'])->name('users.user.edit');
Route::middleware(['jwt.auth', 'role.admin'])->post('/users/add',                   [UsersController::class, 'add'])->name('users.user.add');
Route::middleware('jwt.auth')->post('/users/{user}/delete',                         [UsersController::class, 'delete'])->name('users.user.delete');
Route::middleware('jwt.auth')->post('/users/{user}/attach-role',                    [UsersController::class, 'attachRole'])->name('users.roles.attach-role');
Route::middleware('jwt.auth')->post('/users/{user}/detach-role',                    [UsersController::class, 'detachRole'])->name('users.roles.detach-role');
