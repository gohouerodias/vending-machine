<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

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