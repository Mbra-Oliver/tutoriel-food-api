<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function getAll(){

        try{

            $categories = Categorie::all();

            return response()->json([
                'status_message'=>'Catégories récupérés',
                'data'=>[
                    'items'=>$categories,
                    'total'=>$categories->count()
                ],
                'status_code'=>200
            ],200);


        }catch(Exception $exception){

            return response()->json([
                'status_message'=>$exception->getMessage(),
                'status_code'=>500,
                'data'=>null
            ], 500);
        }

    }
}
