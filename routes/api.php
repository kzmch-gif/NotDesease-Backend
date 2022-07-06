<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coronaTestController;
use App\Http\Controllers\userController;
use App\Http\Controllers\HeathController;
use App\Http\Controllers\NormController;
use App\Http\Controllers\WarningsController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AuthController;
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


//USER 
Route::get('/api/Users/all', [userController::class, 'list']);
Route::get('/api/Users/{id}', [userController::class, 'one']);
Route::post('/api/Users/register', [AuthController::class, 'register']);
Route::post('/api/Users/logout', [AuthController::class, 'logout']);
Route::post('/api/Users/login', [AuthController::class, 'login']);
Route::put('/api/Users/edit/{id}', [userController::class, 'update']);
Route::delete('/api/Users/delete/{id}', [userController::class, 'delete']);



//HEALTH

Route::get('/api/Health/all/{id}', [HeathController::class, 'show']);

Route::post('/api/Health/create', [HeathController::class, 'add']);

Route::put('/api/Health/edit/{id}', [HeathController::class, 'update']);

Route::delete('/api/Health/delete/{id}', [HeathController::class, 'delete']);


//STATISTIC

Route::get('/api/Statistic/all', [StatistController::class, 'index']);

Route::post('/api/Statistic/create', [StatistController::class, 'add']);

Route::put('/api/Statistic/edit/{id}', [StatistController::class, 'update']);

Route::delete('/api/Statistic/delete/{id}', [StatistController::class, 'delete']);

Route::get('/api/Statistic/all/{id}', [StatistController::class, 'show']);
