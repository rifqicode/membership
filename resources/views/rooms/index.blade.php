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
     <button style="float:right;"type="button" class="btn btn-primary" name="button">Create Rooms</button>

     {{-- content --}}
     <div class="row">

       <div class="col-md-12">
         <div class="col-md-4">

           <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Rooms</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div>
                      <img src="" alt="img">
                  </div>
                </div>

                <div class="col-md-4">
                  <p>Participant</p>
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="box-footer no-padding">
                <p style="padding-left:20px;">Created By ()</p>
                <p align="right" style="padding-right:30px;"> <button type="button" name="button" class="btn btn-primary"> Join </button> </p>
            </div>
          </div>



         </div>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

   </section>
   <!-- /.content -->

 </div>
@endsection