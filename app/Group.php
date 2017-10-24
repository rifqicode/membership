<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Group extends Model
{
    //
    public static function GetGroupJoined()
    {
      $datas = DB::table('joingroups')
                ->join('groups', 'joingroups.idGroup', '=', 'groups.id')
                ->orderBy('groupname', 'asc')
                ->where('idUser', Auth::user()->id)->get();
      return $datas;
    }
}
