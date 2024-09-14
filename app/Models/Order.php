<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function foods(){
        return $this->belongsToMany(Food::class,'order_foods')->withPivot('quantity','status','delivered_date')->withTimeStamps();
    }


    public static function createWithFood($orderData,$items){

        $order = self::create($orderData);
        //Rattacher les foods a la commande

        foreach($items as $item){

            $order->foods()->attach($item['id'],['quantity'=>$item['quantity']]);
        }

        return $order;

    }

}
