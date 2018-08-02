<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post as Post;

class Post extends Model
{
    public function comment()
    {
      return $this->hasMany('App\Comment');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public static function likePost($User , Int $post_id , Int $value)
    {

      $update = array (
          'like' => $value,
          'user_like' => $User
      );

      $query = Post::where('id' , $post_id)->update($update);

      return $query;
    }

    public static function viewAllPost(string $id)
    {
      $query =  Post::with('user:id,name,image' , 'comment.user:id,name,image')
                      ->where('user_id' , $id)
                      ->orderBy('created_at', 'DESC')
                      ->get();
      return $query;
    }

    public static function viewAllFriendPost(array $id)
    {
      $query =   Post::with('user:id,name,image' , 'comment.user:id,name,image')
                      ->whereIn('user_id' , $id)
                      ->orderBy('created_at', 'DESC')
                      ->get();
      return $query;
    }

}
