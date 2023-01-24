<?php

use App\Http\Controllers\OrganizationsController;
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

Route::middleware('jwt.auth')->get('/organizations',                              [OrganizationsController::class, 'browse'])->name('organizations.organization.browse');
Route::middleware('jwt.auth')->get('/organizations/{organization}',               [OrganizationsController::class, 'read'])->name('organizations.organization.read');
Route::middleware('jwt.auth')->post('/organizations/{organization}/edit',         [OrganizationsController::class, 'edit'])->name('organizations.organization.edit');
Route::middleware('jwt.auth')->post('/organizations/add',                         [OrganizationsController::class, 'add'])->name('organizations.organization.add');
Route::middleware('jwt.auth')->post('/organizations/{organization}/delete',       [OrganizationsController::class, 'delete'])->name('organizations.organization.delete');
