<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Detail_users extends Model
{


    //   public function id_users()
    // {
    //     return $this->hasOne('App\User');
    // }

    public static function findId_Users($id)
    {
      $find = Detail_users::select('*')->where('id_users', '=', $id)->get();
      return $find;
    }

}
