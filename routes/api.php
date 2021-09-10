<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Admin\Client\AdminClientsController;

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

Route::middleware('auth:sanctum')->get('/authenticated', [LoginController::class, 'authenticated']);


Route::post('login' , [LoginController::class, 'login']);
Route::post('logout' , [LoginController::class, 'logout']);

Route::resource('cliente', ClientController::class)->only(['store', 'show', 'edit','update']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('/clients', AdminClientsController::class);
    });
});
