@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Groups</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
        @php

          $a = $_SERVER['REQUEST_URI'];
          $uri_segments = explode('/', $a);
          echo $uri_segments[1];
        @endphp
    </section>
    <!-- /.content -->
  </div>
@endsection
