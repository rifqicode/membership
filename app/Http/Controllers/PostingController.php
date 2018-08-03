<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;

class PostingController extends Controller
{
    // Auth
    private $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost(Request $request)
    {
      $usersId = Auth::user()->id;
      $image = $request->file('image');

      if (!$image) {
        $post = new Post;
        $post->user_id = $usersId;
        $post->text = $request->input('text');
        $post->updated_at = NULL;
        $post->save();
        
      } else {

        $filename = Auth::user()->name.'_'.rand(1,99999).'.'.$image->getClientOriginalExtension();

        $post = new Post;
        $post->user_id = $usersId;
        $post->proof = $filename;
        $post->text = $request->input('text');
        $post->updated_at = NULL;
        $post->save();

        // move
        $image->move('posting' , $filename);

      }

      return redirect('/home');


    }

    public function like(Request $request)
    {

      $userId =  Auth::user()->id;
      $dataPost = Post::select('user_like' , 'like')->where('id', $request->idpost)->get();

      if (empty($dataPost[0]->like)) {

        $like = Post::likePost($userId , $request->idpost , 1);

      } else {

        $valueLike = $dataPost[0]->like + 1;
        $newLike = [];

        if ($valueLike >= 2) {

          $usersLike = $dataPost[0]->user_like;
          $explode = explode(',' , $usersLike);

          if (in_array($userId , $explode)) {
            return '';
          }

          $new = [$userId];
          $merge = array_merge($explode , $new );
          $implode = implode(',' , $merge);

          $like = Post::likePost($implode , $request->idpost , $valueLike);

        } elseif ($valueLike == 1) {

          $usersLike = $dataPost[0]->user_like;
          $explode = explode(',' , $usersLike);
          $newLike = [$userId];

          if (in_array($userId , $explode)) {
            return '';
          }

          $merge = array_merge($explode , $newLike);
          $implode = implode(',' , $merge);

          $like = Post::likePost($implode , $request->idpost , $valueLike);

        }

      }

      if ($like) {
        return 'success';
      } else {
        return '';
      }

    }
}
