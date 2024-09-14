<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function saveOrder(Request $request){

        DB::beginTransaction();

        try{

            //Donnee de la commande

            $orderData = [
                'order_date'=>now(),
                'user_id'=>auth('sanctum')->user()->id
            ];

            //Valider les donnees recu

            $validator = Validator::make($request->all(),[
                'items'=>'required|array',
                'items.*.id'=>'required|exists:foods,id',
                'items.*.quantity'=>'required|integer|min:1'
            ],[
                'items.required'=>'Vous devez passer au moins un repas',
                'item.*.id.required'=>'Vous devez passer l\'identitifants des repas',
                'items.*.id.exists'=>'L\'identitifiant du repas est invalide'
            ]);

            if($validator->fails()){
                return $this->errorResponse($validator->errors(),422);
            }

            $order = Order::createWithFood($orderData,$request->items);

        DB::commit();
        return $this->successResponse([
            'order'=>$order
        ],'La commande à été enregistrée',201);

        }catch(Exception $e){
            DB::rollBack();
            return $this->errorResponse($e->getMessage(),500);
        }
    }



    public function getAll(){

        try{


            $oders = Order::where('user_id', auth('sanctum')->user()->id)->with('foods')->orderBy('id','desc')->get();

            return $this->successResponse(['items'=>$oders],'Nous avons récupérés vos commandes');

        }
        catch(Exception $exception){

            return $this->errorResponse($exception->getMessage(),500);

        }
    }

    public function getOne(Order $order){

        try{

            $order->load('foods');

            return $this->successResponse($order,'Commande récupérée',200);

        }
        catch(Exception $exception){
           return $this->errorResponse($exception->getMessage(),500);
        }

    }

    public function changeStatus(Order $order,Request $request){
        DB::beginTransaction();
        try{
            $validator = Validator::make($request->all(),[
                'status'=>'required|string'
            ],
        ['status.required'=>'Le status de la command est requis']);

        if($validator->fails()){
            return $this->errorResponse($validator->errors(),422);
        }

        $order->status = $request->status;

        $order->update();
        DB::commit();

        return $this->successResponse(['order'=>$order],'Commande mise à jour');

        }
        catch(Exception $exception){
            DB::rollBack();
           return $this->errorResponse($exception->getMessage(),500);
        }
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
