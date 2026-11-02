<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'status'
    ];

    public function products(){
        return table = $this->belongsToMany(Products::class)
                ->withPivot('quality', 'price')
                ->withTimestamps();
    }
}
