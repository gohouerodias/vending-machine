<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity_init',
        'price_unit',
        'expiration_date',
    ];
    public $quantitySell=[];

    public function room()
    {
      return $this->belongsTo(Room::class);
    }

    public function sellEvents()
    {
       return $this->hasMany(SellEvent::class);
    }

    public function notifications()
    {
       return $this->hasMany(Notifications::class);
    }
}