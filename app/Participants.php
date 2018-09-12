<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Participants extends Model
{
    public function rooms()
    {
      return $this->belongsToMany('App/Rooms');
    }

    public function user()
    {
      return $this->hasOne('App/User');
    }

    public static function findParticipants($room_id , $user_id)
    {
      $query =  DB::table('participants')
                ->select('*')
                ->where(['user_id' => $user_id , 'room_id' => $room_id])
                ->get();

      return $query;
    }

}
