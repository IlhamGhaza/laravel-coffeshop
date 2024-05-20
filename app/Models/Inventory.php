<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['item_name', 'stock', 'unit', 'supplier_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
        return $this->hasMany(Product::class);
    }
}
