<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function roomDatas()
    {
       return $this->hasMany(RoomData::class);
    }

      public function products()
    {
       return $this->hasMany(Products::class);
    }

}
