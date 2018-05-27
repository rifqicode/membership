<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function detailUsers()
    {
       return $this->hasOne('App\Detail_users');
    }

    public function post()
    {
       return $this->hasMany('App\Post');
    }

    public function comment()
    {
      return $this->hasMany('App\Comment');
    }

    public static function getUsersWithDetail($param)
    {
      return User::where('id' , $param )->with('detailUsers')->get();
    }

}
