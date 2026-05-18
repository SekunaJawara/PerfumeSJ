<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'perfume_id', 'quantity', 'price', 'subtotal'];

    //Relación con Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //Relación con Perfume
    public function perfume()
    {
        return $this->belongsTo(Perfume::class);
    }
}
