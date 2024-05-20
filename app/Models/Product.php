<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
        'price',
        'stock',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'id_product');
    }

    // public function inventory(){
    //     // return $this->hasOne(Inventory::class, 'stock');
    //     return $this->belongsTo(Inventory::class, 'stock');
    // }

}
