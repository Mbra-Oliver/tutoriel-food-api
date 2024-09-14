<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $this->errorResponse($validator->errors(),422);
            }

            $user = User::create([
                'lastname'=>$request->lastname,
                'firstname'=>$request->firstname,
                'email'=>$request->email,
                'main_phone'=>$request->main_phone,
                'password'=>Hash::make($request->password)
            ]);

            $token = $user->createToken(env('APP_BACKEND_TOKEN_KEY'))->plainTextToken;
            DB::commit();

           return $this->successResponse([
                    'token'=>$token,
                    'user'=>$user
                ],'Le compte de l\'utilisateur à été créer',201);

        }catch(Exception $e){
            DB::rollBack();
            $this->errorResponse($e->getMessage(),500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'Cette adresse n\'est associée à aucun compte',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        $credentials = $validator->validated();

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse('Mot de passe ou email invalide !', 401);
        }

        $user = Auth::user();
        $token = $user->createToken(env('APP_BACKEND_TOKEN_KEY'))->plainTextToken;

        return $this->successResponse([
            'token' => $token,
            'user' => $user,
        ], 'Vous êtes connecté');
    }


private function errorResponse($message, $statusCode)
{
    return response()->json([
        'status_code' => $statusCode,
        'status_message' => $message,
        'data' => null,
    ], $statusCode);
}

private function successResponse($data, $message, $statusCode = 200)
{
    return response()->json([
        'status_code' => $statusCode,
        'status_message' => $message,
        'data' => $data,
    ], $statusCode);
}
}
