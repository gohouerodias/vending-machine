<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomData extends Model
{
    use HasFactory;



    public function room()
    {
      return $this->belongsTo(Room::class);
    }
}