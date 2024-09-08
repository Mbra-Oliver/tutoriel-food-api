<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Food;
use Exception;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function latest(){
        try{

            $foods = Food::with('restaurant')->latest()->limit(20)->orderBy('id','desc')->get();
            return response()->json([
                'status_message'=>'Nourriture récupérés',
                'status_code'=>200,
                'data'=>[
                    'items'=>$foods,
                    'total'=>$foods->count()
                ]
            ], 200);

        }catch(Exception $exception){

            return response()->json([
                'status_message'=>$exception->getMessage(),
                'status_code'=>500,
                'data'=>null
            ], 500);
        }
    }

    public function Paginate(Request $request){

        try{

            //Recuperer les nourritures par Categorie (Si l'utilisateur le souhaite)
            //Rechercher les nourritures par le nom en tenant compte de la categorie (si elle existe)

            $searchCategorie = null;
            $search = $request->query('search');
            $categoryId= $request->query('categoryId');


            $query = Food::with('restaurant')->latest();

            //Si categorieId existe
            if($categoryId){

                $query->whereHas('foodSubCategorie', function($query) use ($categoryId){
                    $query->where('category_id',$categoryId);
                })->with('foodSubCategorie');
            }

            //Si la recherche est venue
            if($search){
                $query->where(function($query) use ($search){
                    $query->where('name','like',"%{$search}%")
                    ->orWhere('description','like',"%{$search}%");
                });
            }


            $foods = $query->get();


            if($categoryId){
               $check = Categorie::find($categoryId);
               if($check){
                $searchCategorie = Categorie::find($categoryId)->name;
               }
            }
            return response()->json([
                'status_message'=>'Nourritures récupérés',
                'status_code'=>200,
                'data'=>[
                    'search'=>$search,
                    'categorie'=>$searchCategorie,
                    'items'=>$foods,
                    'total'=>$foods->count()
                ]
            ],200);

        }catch(Exception $exception){
                return response()->json([
                'status_message'=>$exception->getMessage(),
                'status_code'=>500,
                'data'=>null
            ], 500);
        }

    }

    public function getOne($id){
        try{
            $food = Food::with(['restaurant','foodSubCategorie'])->find($id);

            return response()->json([
                'status_message'=>'Nourriture trouvée !',
                'status_code'=>200,
                'data'=>$food
            ], 200);

        }catch(Exception $exception){
            return response()->json([
                'status_message'=>$exception->getMessage(),
                'status_code'=>500,
                'data'=>null
            ], 500);
        }
    }
}
