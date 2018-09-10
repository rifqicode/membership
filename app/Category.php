<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function room()
    {
      return $this->hasMany('App\Rooms');
    }

}
