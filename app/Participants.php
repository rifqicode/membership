<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Participants extends Model
{
    public function rooms()
    {
      return $this->belongsTo('App/Rooms');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public static function findParticipants($room_id , $user_id)
    {
      $query =  DB::table('participants')
                ->select('*')
                ->where(['user_id' => $user_id , 'room_id' => $room_id])
                ->get();

      return $query;
    }

    public function getParticipantList(String $room_id)
    {

      $query =  DB::table('participants')
                ->select('users.name')
                ->join('users' , 'participants.user_id' , '=' ,'users.id')
                ->where('room_id' , $room_id)
                ->get();

      return $query;

    }

}
