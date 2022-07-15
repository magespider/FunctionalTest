<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ColumnsController;
use App\Http\Controllers\API\CardsController;

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
/* Column APIs */  
Route::resource('columns', ColumnsController::class)->only(['index', 'store', 'update', 'destroy']);

Route::post('card-orderchange/{column_id}',[ColumnsController::class,'cardOrderChange']);

/* Card APIs */  
Route::resource('cards', CardsController::class)->only(['index', 'store', 'update', 'destroy']);

Route::post('cards/{card_id}/column/{column_id}',[CardsController::class,'columnUpdate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
