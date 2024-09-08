<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/user/create',[UserController::class,'register']);


//Route pour les catégories d'aliment

Route::get('categories',[CategorieController::class,'getAll']);

//Route pour les aliments

Route::prefix('foods')->group(function(){
    Route::get('latest',[FoodController::class,'latest']);
    Route::get('all',[FoodController::class,'Paginate']);
    Route::get('{id}',[FoodController::class,'getOne']);
});
