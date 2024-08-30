<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;



//Route pour les catégories d'aliment

Route::get('categories',[CategorieController::class,'getAll']);

//Route pour les aliments

Route::prefix('foods')->group(function(){
    Route::get('latest',[FoodController::class,'latest']);
    Route::get('all',[FoodController::class,'Paginate']);
    Route::get('{id}',[FoodController::class,'getOne']);
});
