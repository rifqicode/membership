<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public function participant()
    {
      return $this->hasMany('App/Participants');
    }

    public function user()
    {
      return $this->hasMany('App/User');
    }
}
