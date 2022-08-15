<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'sold_at',
        'Card_Subscribers_id',
        'product_id',
        'updated_at',
        'created_at'
    ];
}