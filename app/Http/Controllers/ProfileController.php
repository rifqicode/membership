<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_users;
use App\User;
use Auth;
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
        $datauser = Detail_users::findId_Users($iduser);
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

        $find = Detail_users::Find($iduser);

        if (empty($find))
        {
          $create = new Detail_users;
          $create->id_users = $iduser;
          $create->full_name = $request->input('full_name');
          $create->birthdate = $request->input('birthdate');
          $create->address = $request->input('address');
          $create->contact = $request->input('contact');
          $create->save();
          return redirect('/profile');

        } else {
          $update = $find;
          $update->full_name = $request->input('full_name');
          $update->birthdate = $request->input('birthdate');
          $update->address = $request->input('address');
          $update->contact = $request->input('contact');
          $update->update();
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
