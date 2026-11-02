<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * Los atributos que se pueden asignar masivamente.
     * Define aquí los campos de tu schema que permites guardar con Product::create() o $product->update().
     */
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];

    /**
     * Conversión automática de tipos de atributos (Casting).
     * Garantiza que Laravel devuelva estos valores con su tipo de dato nativo en PHP.
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function orders(){
        return $this->belongsToMany(Order::class)
                ->withPivot('quality', 'price')
                ->withTimestamps();
    }
}

