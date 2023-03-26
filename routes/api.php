<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PropertyController as ApiPropertyController;
use App\Http\Controllers\Api\ServiceController as ApiServiceController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/properties/services', [ ApiServiceController::class, 'index' ])->name('api.properties.services');
Route::get('/properties', [ ApiPropertyController::class, 'index' ])->name('api.properties.index');
Route::get('/properties/{property}', [ ApiPropertyController::class, 'show' ])->name('api.properties.show');
//Route::middleware('auth:api')->get('/properties/{property}', [ ApiPropertyController::class, 'show' ])->name('api.properties.show');
