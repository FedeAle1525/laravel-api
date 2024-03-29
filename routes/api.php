<?php

use App\Http\Controllers\Api\ProjectController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotta che interroga API passando per ApiController con metodo 'index'
Route::get('/projects', [ProjectController::class, 'index']);

// Rotta che interroga API passando per ApiController con metodo 'show'
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
