<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('saludo/{name}', function ($name) {
    echo "Hola ".$name;
});

Route::get('suma/{num1}/{num2}/{num3?}', function ($num1, $num2, $num3=0) {
    echo $num1 + $num2 + $num3;
}) -> where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

Route::post('suma/', function(Request $request) {

});

Route::get('users/', [UserController::class, 'index']);

Route::get('users/create', [UserController::class, 'create']);

Route::get('users/{id}', [UserController::class, 'show']);

Route::post('users/', [UserController::class, 'store']);


Route::get('clients/', [ClientController::class, 'index']);

Route::get('clients/create', [ClientController::class, 'create']);

Route::get('clients/{id}', [ClientController::class, 'show']);

Route::post('clients', [ClientController::class, 'store']);



Route::get('reservations/', [ReservationController::class, 'index']);

Route::get('reservations/create', [ReservationController::class, 'create']);

Route::get('reservations/{id}', [ReservationController::class, 'show']);
