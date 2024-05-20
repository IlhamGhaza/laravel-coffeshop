<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_code',
        'customer_name',
        'customer_phone',
        'reservation_date',
        'reservation_time',
        'status',
        'notes',
        'table_number',

    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
