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
