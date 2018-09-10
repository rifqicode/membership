<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public function participant()
    {
      return $this->hasMany('App\Participants');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function category()
    {
      return $this->belongsTo('App\Category', 'categories_id', 'id');
    }
}
