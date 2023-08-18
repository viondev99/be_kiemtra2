<?php

use App\Http\Controllers\ChannelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function () {
    Route::get('employees', [ChannelController::class, 'index']);
    Route::get('employees/{id}', [ChannelController::class, 'show']);
    Route::post('employees', [ChannelController::class, 'store']);
    Route::put('employees/{id}', [ChannelController::class, 'update']);
    Route::delete('employees/{id}', [ChannelController::class, 'destroy']);
});
