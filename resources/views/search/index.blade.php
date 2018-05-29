@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        <li class="active">Search</li>
      </ol>

      <br>
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Search List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">

                  @foreach ($datauser as $key => $value)
                  <div class="col-md-3">
                      <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="{{ asset("/img" .'/'. $value->image ."")}}" alt="User profile picture">
                          <h3 class="profile-username text-center">{{ $value->name }}</h3>
                          <a href="{{ url('/user/addfriend/').'/'.$value->id.'' }}" class="btn btn-primary btn-block"><b>Add Friend</b></a>
                        </div>
                      </div>
                  </div>
                  @endforeach

               </div>
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <script type="text/javascript">
     // function creatingComments(param , input){
     //     var value = input.value;
     //     $.ajaxSetup({
     //       headers: {
     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //       }
     //     });
     //     $.ajax({
     //       type: "POST",
     //       url: '/comments/create',
     //       data: {idpost:param , text:value },
     //       success: function( msg ) {
     //         alert(msg);
     //         input.value = "";
     //         location.reload();
     //       },
     //       error: function ( err ){
     //         console.log(err);
     //       }
     //   });
     //  }
     //
     //  function likePost() {
     //    alert('i like this one');
     //  }
  </script>
@endsection
