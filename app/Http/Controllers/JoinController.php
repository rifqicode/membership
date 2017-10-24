<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;

class JoinController extends Controller
{
    //
    public function JoinGroup($id)
    {
      $data = json_decode(Auth::user()->group);
      $d = array($id);

      if ($d != $data) {
          $datas = json_encode(array_merge($data, $d));
          $insert = Auth::user();
          $insert->group = $datas;
          $insert->save();
          return redirect('group');
      }else {
          return redirect('group');
      }
    }

    public function LeaveGroup($id)
    {
      $data = json_decode(Auth::user()->group);
      $d = array($id);

      if (in_array($id, $data) == TRUE) {
                //return array_values($data);
          $dt = array_values(array_diff($data, $d));
          $hh = json_encode($dt);
          $insert = Auth::user();
          $insert->group = $hh;
          $insert->save();
          return redirect('group');
      }else {
          return redirect('group');
      }
    }
}
