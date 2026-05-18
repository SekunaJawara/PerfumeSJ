<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfume extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Brand',
        'Description',
        'price',
        'notas_principales',
        'notas_salida',
        'notas_corazon',
        'notas_base',
        'stock',
        'longevidad',
        'sillage',
        'genero',
        'edad_recomendada',
        'recomendacion_primavera',
        'recomendacion_verano',
        'recomendacion_otono',
        'recomendacion_invierno',
        'logo',
        'user_id',
        'banner'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['nota'] ?? false) {
            $query->where('notas_principales', 'like', '%' . request('nota') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('Name', 'like', '%' . request('search') . '%')
                ->orWhere('Brand', 'like', '%' . request('search') . '%')
                ->orWhere('Description', 'like', '%' . request('search') . '%')
                ->orWhere('notas_principales', 'like', '%' . request('search') . '%');

        }

    }

    //Relación con User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relación con OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    //Relación con CartItems
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
