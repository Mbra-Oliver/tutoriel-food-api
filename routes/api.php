<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/user/create',[UserController::class,'register']);
Route::post('/user/login',[UserController::class,'login']);


//Route pour les catégories d'aliment

Route::get('categories',[CategorieController::class,'getAll']);

//Route pour les aliments

Route::prefix('foods')->group(function(){
    Route::get('latest',[FoodController::class,'latest']);
    Route::get('all',[FoodController::class,'Paginate']);
    Route::get('{id}',[FoodController::class,'getOne']);
});

Route::middleware('mobile.auth')->group(function(){

    //Route pour les commandes
    Route::prefix('orders')->group(function(){
        Route::get('/',[OrderController::class,'getAll']);
        Route::post('create',[OrderController::class,'saveOrder']);
        Route::get('one/{order}',[OrderController::class,'getOne']);
        Route::put('/update-status/{order}',[OrderController::class,'changeStatus']);
    });




});


// Creation commande
// {
// 	"items": [
// 		{
// 			"id": 2,
// 			"quantity": 1
// 		},
// 		{
// 			"id": 3,
// 			"quantity": 1
// 		},
// 		{
// 			"id": 8,
// 			"quantity": 1
// 		}
// 	]
// }
