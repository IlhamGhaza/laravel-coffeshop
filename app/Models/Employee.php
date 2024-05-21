<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'position',
        'date_of_birth',
        'date_of_joining',
        'salary',
        'address'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
