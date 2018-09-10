<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    public function rooms()
    {
      return $this->hasOne('App/Rooms');
    }

    public function user()
    {
      return $this->hasOne('App/User');
    }
}
