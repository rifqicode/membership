@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title">Create Rooms</h3>
      </div>

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{ route('postRooms')}}">
        {{ csrf_field() }}

        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Rooms Name</label>
            <input type="text" class="form-control" name="room" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Category </label>

            <select class="form-control" name="category" id="category" required>

              @foreach ($category as $key => $value)
                <option value="{{ $value->id}}"> {{ $value->name }}</option>
              @endforeach

            </select>
          </div>

          <div class="form-group">
            <label>Date and time range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
              <input type="text" name="daterange" class="form-control pull-right" id="daterangepicker" required>
            </div>
            <!-- /.input group -->
          </div>

          <div class="checkbox">
            <label>
              <input type="checkbox"> I agree
            </label>
          </div>

          <div class="form-group">
            <button type="submit" style="float:right;" class="btn btn-primary" name="button"> Create Rooms </button>
          </div>

        </div>



      </form>

    </div>
      {{-- form end --}}

   </section>
   <!-- /.content -->

 </div>

@endsection
