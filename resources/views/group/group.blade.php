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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Groups</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <div id="example1_filter" class="dataTables_filter">
                      <label>Search:<input class="form-control input-sm" placeholder="" aria-controls="example1" type="search">
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="tblGroup" class="table table-bordered table-striped dataTable" role="grid">
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10.200px;" aria-sort="ascending" aria-label="no: activate to sort column descending">No</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198.733px;" aria-label="groupname: activate to sort column ascending">Group's name</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.883px;" aria-label="person: activate to sort column ascending">Action</th></tr>
                </thead>
                <tbody>
                  @foreach ($data as $g)
                      <tr>
                        <td>{{ $g->id }}</td>
                        <td>{{ $g->groupName }}</td>
                        @php
                          $haha = json_decode(Auth::user()->group);
                        @endphp
                        @if (in_array($g->id, $haha))
                          <td><a href="leave/{{ $g->id }}" class="btn btn-danger">Leave</a></td>
                        @else
                          <td><a href="join/{{ $g->id }}" class="btn btn-primary">Join</a></td>
                        @endif
                      </tr>
                  @endforeach
                </tbody>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
