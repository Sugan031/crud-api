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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'create'])->name('register');
Route::get('index',[UserController::class,'index'])->name('index');
Route::get('index/{id}',[UserController::class,'index']);
Route::put('index/{id}/edit',[UserController::class,'update']);
Route::delete('index/{id}/delete',[UserController::class,'delete']);
Route::post('login',[UserController::class,'login']);
