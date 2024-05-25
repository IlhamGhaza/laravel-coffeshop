<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'stock', 'unit'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
        // return $this->hasMany(Product::class);
    }
}
