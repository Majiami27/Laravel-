<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\WifiMachineController;

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

Route::get('machine', 'App\Http\Controllers\api\WifiMachineController@index');
Route::post('machine/edit', 'App\Http\Controllers\api\WifiMachineController@index');

Route::get('user', 'App\Http\Controllers\api\UserController@index');
Route::post('user/add', 'App\Http\Controllers\api\UserController@create');



//Route::get('machine', function () {
//    WifiMachineController::getInstance()->index();
//});

