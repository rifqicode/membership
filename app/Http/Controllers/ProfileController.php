<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Detail_users;
use App\User;
use App\Post;

use Auth;
use DB;

class ProfileController extends Controller
{
    private $user;
    private $post;
    private $detailUser;

    public function __construct(User $user , Post $post , Detail_users $detail)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->post = $post;
        $this->detailUser = $detail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        $iduser = $user->id;
        $datauser = $this->detailUser->findUsersById($iduser);
        $countFollowers = $this->user->findFollowerUsers($iduser);

        $following = 0;
        if ($user->friend) {
          $following = sizeOf(explode(" " , $user->friend));
        }

        $datapost = Post::where('user_id' , $iduser)->with('user:id,name,image' , 'comment.user:id,name,image')->orderBy('created_at' , 'DESC')->get();
        return view('profile.index' , compact('datauser' , 'datapost' , 'countFollowers' , 'following'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $iduser = $user->id;

        $find = Detail_users::findUsersById($iduser);

        // verification
        if (sizeof($find) == 0)
        {
          // $user->verification = 1;
          // $user->update();
          $create = new Detail_users;
          $create->id_users = $iduser;
          $create->full_name = $request->input('full_name');
          $create->birthdate = $request->input('birthdate');
          $create->address = $request->input('address');
          $create->contact = $request->input('contact');
          $create->save();
          return redirect('/profile');

        } else {

          $findBirthdate = Detail_users::findId_Users($iduser);

          return $findBirthdate;
          foreach ($findBirthdate as $key) {
            $birthdate = $key->birthdate;
          }

          $update = DB::table('detail_users')
                    ->where('id_users' , $iduser)
                    ->update(['full_name' => $request->input('full_name'),
                             'birthdate'  => $birthdate,
                             'address'    => $request->input('address'),
                             'contact'    => $request->input('contact')]);

          return redirect('/profile');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
