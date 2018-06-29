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

    public function addFriend(int $id)
    {

      $find = User::select('friend')->where('id' , Auth::user()->id)->get();
      $friendlist = [];
      $newfriend = [''.$id.''];


      foreach ($find as $key => $value) {
        $friendlist = [$value->friend];
      }

      if (empty($value->friend)) {

          $user = User::find(Auth::user()->id);
          $user->friend = $id;
          $user->update();

          return redirect('home');

      } else {

        if (in_array($id , $friendlist)) {

           return 'udah temenan elu woi';

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
