<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function rooms()
    {
      return $this->belongsTo('App\Rooms');
    }

    public static function getItemByIdRoom(Int $id_room)
    {
      return $this->where('id_room' , $id_room);
    }
}
