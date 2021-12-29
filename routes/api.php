<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProductController;


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

Route::group(['prefix' => 'v1'], function () use ($router) {

    Route::get('/authors', [AuthorController::class, 'showAllAuthors']);
  
    Route::post('/authors', [AuthorController::class, 'create']);

    Route::group(['prefix' => 'product'], function () use ($router) {
        Route::post('/getbyupc', [ProductController::class, 'getProdsByUpc']);
    });   
  
  });