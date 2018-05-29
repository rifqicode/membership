<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as User;
use  Illuminate\Support\Facades\Input;
use DB;
use Auth;

class FriendController extends Controller
{
    public function searchUser()
    {
      $userName = strtoupper(Input::get('user'));
      $find = User::select('id' , 'image' ,'name' , 'email' , 'friend')->where(DB::raw('upper(name)'), 'LIKE', ''.$userName.'%')->get();
      return view('search.index')->with('datauser' , $find);
    }

    public function addFriend($id)
    {
      $find = User::select('friend')->where('id' , Auth::user()->id)->get();
      $friendlist = [];
      $newfriend = [''.$id.''];
      foreach ($find as $key => $value) {
        $friendlist = explode(',' ,$value->friend);
      }

      if (sizeOf($friendlist) === 0) {
        $get = User::find(Auth::user()->id);
        $get->friend = implode('' , $newfriend);
        $get->update();
        return redirect('home');

      }else {
        if (in_array($id , $friendlist)) {
          return redirect('home');
        } else {
          $addfriend = array_merge($friendlist,$newfriend);
          $implode = implode("," ,$addfriend);
          $id = Auth::user()->id;
          $update = User::find($id);
          $update->friend = $implode;
          $update->update();
          return redirect('home');
        }

      }

    }
}
