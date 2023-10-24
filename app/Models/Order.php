<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'city', 'postal_code', 'total', 'payment_method', 'payment_status', 'order_status'
    ];

    public function details()
    {
        return $this->hasMany('App\Models\OrderMeta');
    }
}
