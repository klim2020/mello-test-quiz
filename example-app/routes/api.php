<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/test', [UserController::class,'test']);

Route::middleware('auth:sanctum')->get('/show', [\App\Http\Controllers\MovieController::class,'show']);


Route::post('/token', [UserController::class, 'token']);



