<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Auth;

class CommentController extends Controller
{
  public function createComment(Request $request)
   {
     if ($request->input('text')) {
       $id = Auth::user()->id;
       $comment = new Comment;
       $comment->user_id =  $id;
       $comment->post_id =  $request->input('idpost');
       $comment->text =  $request->input('text');
       $comment->save();
       return "sukses";
     }
     return 'null';
   }
}
