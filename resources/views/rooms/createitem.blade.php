@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title">Create Items</h3>
      </div>

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{ route('postItem' , ['id_room' => $room_id])}}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Item Name</label>
            <input type="text" class="form-control" name="item" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Image Item</label>
            <input type="file" name="item_pic" autocomplete="off" required>
          </div>

          <div class="form-group">
            <button type="submit" style="float:right;" class="btn btn-primary" name="button"> Create Item </button>
          </div>

        </div>



      </form>

    </div>
      {{-- form end --}}

   </section>
   <!-- /.content -->

 </div>

@endsection
