<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request){
        DB::beginTransaction();
        try{

            $validator = Validator::make($request->all(),[
                'lastname'=>'required|string',
                'firstname'=>'required|string',
                'main_phone'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|string|min:4'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status_code'=>422,
                    'status_message'=>'Données invalide',
                    'data'=>null
                ],422);
            }

            $user = User::create([
                'lastname'=>$request->lastname,
                'firstname'=>$request->firstname,
                'email'=>$request->email,
                'main_phone'=>$request->main_phone,
                'password'=>Hash::make($request->password)
            ]);

            $token = $user->createToken('FOOD_API_USER_TOKEN')->plainTextToken;
            DB::commit();

            return response()->json([
                'status_code'=>201,
                'status_message'=>'Le compte de l\'utilisateur à été créer',
                'data'=>[
                    'token'=>$token,
                    'user'=>$user
                ]
            ],201);

        }catch(Exception $e){
            DB::rollBack();
             return response()->json([
                'status_code'=>500,
                'status_message'=>$e->getMessage(),
                'data'=>'SERVER ERROR'
            ],500);
        }
    }

    public function login(Request $request){}
}
