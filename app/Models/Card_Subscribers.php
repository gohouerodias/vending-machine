<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card_Subscribers extends Model
{
    use HasFactory;
    public function sellEvents()
    {
        return $this->hasMany(SellEvent::class);
    }
}