<?php

use App\Http\Controllers\TaskController;
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

/*Route::get('tasks', [TaskController::class,'index']);
Route::get('tasks2', function(Request $request){
    [TaskController::class,'show'];
});*/

//Route::resource('tasks', TaskController::class);
Route::prefix('tasks')->group(function () {
    Route::get('/',[ TaskController::class, 'index']);
    Route::post('/',[ TaskController::class, 'store']);
    Route::delete('/{id}',[ TaskController::class, 'destroy']);
    Route::get('/{id}',[ TaskController::class, 'show']);
    Route::put('/{id}',[ TaskController::class, 'update']);
});

