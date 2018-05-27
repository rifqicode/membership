<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxResourceController extends Controller
{
    public function findEmailIfSame($email)
    {
      $find = DB::table('users')
              ->select('email')
              ->where('email' , $email)
              ->get();

      return sizeOf($find);
    }
}
