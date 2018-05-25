<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Detail_users extends Model
{


    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public static function findUsersById($id)
    {
      $find = Detail_users::select('*')->where('id_users', '=', $id)->get();
      return $find;
    }


}
