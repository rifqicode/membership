@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Rooms
     </h1>
     <ol class="breadcrumb">
       <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">User profile</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     {{-- create rooms --}}
     <div class="row">
       <div class="col-md-12">
         <a href="{{ route('createRooms')}}" class="btn btn-primary" style="float:right">Create Rooms</a>
       </div>
     </div>

     {{-- content --}}
     <div class="row">
       <br>
       <div class="col-md-12">
         @foreach ($rooms as $key => $value)
         <div class="col-md-4">

           <div class="box box-default" style="height:240px;">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $value['name'] }}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div>
                      <img src="{{ asset("/category" .'/'. $value['category_img'] ."")}}" height="130" width="200" alt="Category Img">
                  </div>
                </div>

                <div class="col-md-4" style="height:100px;">
                  <p>Participant</p>
                  <ul class="chart-legend clearfix">
                    @foreach ($value['participant'] as $key => $value2)
                      <li><i class="fa fa-circle-o text-red"></i> {{ $value2->user_id}} </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="box-footer no-padding">
                <p style="padding-left:20px;">Created By ( {{ $value['user']->name }} )</p>
                @if ($value['status'] == 1)
                  <div class="">
                    <p align="right" style="padding-right:30px;">
                       <a class="btn btn-danger" href="{{ route('unJoinRoom' , ['id_room' => $value['id_room']])}}">Unjoin</a>
                      <a class="btn btn-primary" href="{{ route('viewRoom' , ['id_room' => $value['id_room']])}}">View</a>
                    </p>
                  </div>
                @else
                  <p align="right" style="padding-right:30px;"> <a class="btn btn-primary" href="{{ route('joinRoom' , ['id_room' => $value['id_room']])}}">Join</a> </p>
                @endif
            </div>
          </div>



         </div>
         @endforeach
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

   </section>
   <!-- /.content -->

 </div>
@endsection
