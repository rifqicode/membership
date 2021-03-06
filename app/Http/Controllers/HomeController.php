<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $friend = explode(',',Auth::user()->friend);

      if (!Auth::user()->friend) {

        $datapost = $this->post->viewAllPost(Auth::user()->id);
        return view('home')->with('datapost', $datapost);

      } else {

        $id = [Auth::user()->id];
        $merge = array_merge($id,$friend);

        $datapost = $this->post->viewAllFriendPost($merge);
        return view('home')->with('datapost', $datapost);

      }

    }


}
