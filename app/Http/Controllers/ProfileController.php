<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_users;
use App\User;
use Auth;
use DB;
use Session;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::user()->id;
        $datauser = Detail_users::findUsersById($iduser);
        return view('profile.index')->with('data', $datauser);
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
