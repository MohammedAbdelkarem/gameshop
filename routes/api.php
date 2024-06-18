<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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

//User without middleware
Route::group(['prefix' => 'item'], function () {

    
    Route::post('add' , [ItemController::class , 'addItem']);
    Route::post('update' , [ItemController::class , 'updateItem']);
    Route::post('delete' , [ItemController::class , 'deleteItem']);
    Route::post('details' , [ItemController::class , 'itemDetails']);
    Route::get('movies' , [ItemController::class , 'movies']);
    Route::get('games' , [ItemController::class , 'games']);
    Route::get('courses' , [ItemController::class , 'courses']);
    Route::get('serieses' , [ItemController::class , 'serieses']);
    Route::post('search' , [ItemController::class , 'search']);
    

});
Route::group(['prefix' => 'category'], function () {

    Route::get('cat' , [CategoryController::class , 'categories']);
    
});
Route::group(['prefix' => 'subcategory'], function () {

    Route::get('subcat' , [SubCategoryController::class , 'subcategories']);
    
});


//User with middleware
Route::group(['prefix' => 'user' , 'middleware' => ['auth:user']] , function(){

    Route::group(['prefix' => 'trip'], function () {
        
    });
});
