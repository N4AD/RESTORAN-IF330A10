<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'menu_id', 'quantity', 'price'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
