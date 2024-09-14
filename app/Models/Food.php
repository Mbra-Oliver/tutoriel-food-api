<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table='foods';


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }


    public function foodSubCategorie()
    {
        return $this->belongsTo(Subcategorie::class, 'sub_category_id');
    }

}
