<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

/*Route::get('tasks', [TaskController::class,'index']);
Route::get('tasks2', function(Request $request){
    [TaskController::class,'show'];
});*/

//Route::resource('tasks', TaskController::class);
//Route::prefix('tasks')->group(function () { 'middleware' => 'role:Administrador',
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/',[ TaskController::class, 'index']);//->middleware('auth');
    Route::post('/',[ TaskController::class, 'store']);//->middleware('auth');
    Route::delete('/{id}',[ TaskController::class, 'destroy']);//->middleware('auth');
    Route::get('/{id}',[ TaskController::class, 'show']);//->middleware('auth');
    
});

//Route::get('/asignar',[ TaskController::class, 'taskAsignadas']);//->middleware('auth');

Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});

/*Route::group(['middleware' => 'role:Administrador','prefix' => 'users'], function () {
    
});
*/
Route::group(['prefix' => 'tasksAsignar'], function () {
    Route::put('/{id}',[ TaskController::class, 'update'])->middleware('auth');
    Route::get('/',[ TaskController::class, 'taskAsignadas'])->middleware('auth');
});

Route::group(['middleware' => 'role:Administrador','prefix' => 'users'], function () {
    Route::get('role', [RoleController::class, 'index']);
    Route::get('/',[ UserController::class, 'index']);//->middleware('auth');
    Route::post('/',[ UserController::class, 'store']);//->middleware('auth');
    Route::delete('/{id}',[ UserController::class, 'destroy']);//->middleware('auth');
    Route::get('/{id}',[ UserController::class, 'show']);//->middleware('auth');
    Route::put('/{id}',[ UserController::class, 'update']);//->middleware('auth');
});
