<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;

class PostingController extends Controller
{
    public function create(Request $request)
    {
      $usersId = Auth::user()->id;

      $post = new Post;
      $post->user_id = $usersId;
      $post->text = $request->input('text');
      $post->updated_at = NULL;
      $post->save();

      return redirect('/profile');

    }
}
