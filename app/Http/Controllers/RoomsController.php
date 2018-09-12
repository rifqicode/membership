<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Item;
use App\Participants;
use App\Category;

use Auth;

class RoomsController extends Controller
{

    private $rooms;
    private $item;
    private $participant;
    private $category;

    public function __construct(Rooms $rooms , Item $item , Participants $participant , Category $category)
    {
        $this->middleware('auth');
        $this->rooms = $rooms;
        $this->item = $item;
        $this->participant = $participant;
        $this->category = $category;
    }


    public function index()
    {
      // get rooms datas
      $rooms =  $this->rooms->with('user:id,name' , 'category:id,name,img')
                            ->get();

      $result = [];

      foreach ($rooms as $key => $value) {
        $findParticipants = $this->participant->where('room_id' , $value->id)
                                              ->limit(5)
                                              ->orderBy('created_at' , 'DESC')
                                              ->get();

        $checkParticipants = $this->participant->where(['room_id' => $value->id , 'user_id' => Auth::user()->id])->get();
        $status = 0;


        if (sizeOf($checkParticipants) > 0) {
          $status = 1;
        }

        $result[] = [ 'id_room' => $value->id,
                      'name' => $value->name,
                      'start_at' => $value->start_at,
                      'end_at' => $value->end_at,
                      'user' => $value->user,
                      'category' => $value->category,
                      'category_img' => $value->category->img,
                      'participant' => $findParticipants,
                      'status' => $status];


      }

      return view('rooms.index')->with('rooms' , $result);
    }

    // page
    public function createRoomPage()
    {
      $category = $this->category->all();

      return view('rooms.createroom')->with('category', $category);

    }

    public function createItemPage($room_id)
    {
      return view('rooms.createitem')->with('room_id', $room_id);
    }
    // end page

    // method post
    public function createRoom(Request $request , Rooms $room)
    {
      $user_id = Auth::user()->id;

      $startDate = strtotime(substr($request->input('daterange') , 0 , 13));
      $start_at = date('d-m-Y H:i:s',$startDate);


      $endDate = strtotime(substr($request->input('daterange') , 15));
      $end_at = date('d-m-Y H:i:s',$endDate);

      $rooms = new Rooms();
      $rooms->name = $request->input('room');
      $rooms->user_id = $user_id;
      $rooms->categories_id = $request->input('category');
      $rooms->start_at = $start_at;
      $rooms->end_at =  $end_at;
      $rooms->save();

      return redirect()->route('createItem', ['id_room' => $rooms->id]);

    }

    public function createItem(Request $request , $room_id)
    {
      $user_id = Auth::user()->id;
      $image = '';

      if ($request->file('item_pic')) {
        $file = $request->file('item_pic');
        $image = Auth::user()->name.'_'.'giveaway'.'.'.$image->getClientOriginalExtension();
        $file->move('items' , $image);
      }


      $item = new Item();
      $item->room_id = $room_id;
      $item->name = $request->input('item');
      $item->item_picture = $image;
      $item->save();

      return redirect()->route('rooms');

    }

    public function joinRoom($room_id)
    {

      $user_id = Auth::user()->id;

      $find = $this->participant->findParticipants($room_id , $user_id);
      $size = sizeOf($find);

      if (!$size) {
        $participant = new Participants();
        $participant->room_id = $room_id;
        $participant->user_id = $user_id;
        $participant->save();

        return redirect()->route('rooms');
      }

      return redirect()->route('rooms');

    }

    public function unJoinRoom($room_id)
    {
      $user_id = Auth::user()->id;

      $find = $this->participant->where(['room_id' => $room_id , 'user_id' => $user_id])->delete();

      return redirect()->route('rooms');

    }


}
