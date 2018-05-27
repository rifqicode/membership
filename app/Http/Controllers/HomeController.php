<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $iduser = Auth::user()->id;
      $datapost = Post::with('user:id,name,image' , 'comment.user:id,name,image')->orderBy('created_at' , 'DESC')->get();
      return view('home')->with('datapost', $datapost);
    }

    public function craetePost(Request $request)
    {
      $usersId = Auth::user()->id;
      $post = new Post;
      $post->user_id = $usersId;
      $post->text = $request->input('text');
      $post->updated_at = NULL;
      $post->save();

      return redirect('/home');
    }
}
