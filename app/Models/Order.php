<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /* CREATE TABLE $tableOrder(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      payment_amount INTEGER,
      sub_total INTEGER,
      tax INTEGER,
      discount INTEGER,
      service_charge INTEGER,
      total INTEGER,
      payment_method TEXT,
      total_item INTEGER,
      id_kasir INTEGER,
      nama_kasir TEXT,
      transaction_time TEXT,
      is_sync INTEGER DEFAULT 0
    )
    ''');*/

    protected $fillable = [
        'payment_amount',
        'sub_total',
        'tax',
        'discount',
        'service_charge',
        'total',
        'payment_method',
        'total_item',
        'id_kasir',
        'nama_kasir',
        'transaction_time',
        'id_reservasi',
        'order_type',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}
