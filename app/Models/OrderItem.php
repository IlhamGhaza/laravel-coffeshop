<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    protected $fillable = ['id_order','id_product','quantity','price'];

    public function product(){
        return $this->belongsTo(Product::class, 'id_product');
    }


    public function order(){
        return $this->belongsTo(Order::class, 'id_order');
    }
}
