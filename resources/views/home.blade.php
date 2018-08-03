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

      <br>
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dashboard</h3>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="box-body">

                  <div class="user-block">
                    <form class="form-horizontal" action="{{ route('postCreateDashboard') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group margin-bottom-none">
                        <div class="col-sm-9">
                          <textarea name="text" rows="2" cols="100"></textarea>
                          <br>
                          <input type="file" name="image">
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">Post</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  </div>

                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="post" id="post">

                    @foreach ($datapost as $key)
                    <div class="user-block">
                       <img class="img-circle img-bordered-sm" src="{{ asset("img/" . $key->user['image'] . "") }}" alt="user-image">
                             <span class="username">
                               <p> {{ $key->user["name"] }} </p>
                              </span>
                           <span class="description"> Posting at {{ $key->created_at }}</span>
                     </div>
                     <!-- /.user-block -->
                     <p>
                       {{ $key->text }}
                     </p>
                     <ul class="list-inline">
                         <li><p onclick="likePost({{ $key->id }})" class="link-black text-sm"><i onclick="likePost()" class="fa fa-thumbs-o-up margin-r-5"></i> {{ $key->like }} Like </p></li>
                         <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5">{{-- comment --}}</i></a></li>

                     </ul>

                   @foreach ($key->comment as $comment)
                     <div class="user-block col-sm-12">
                           <img class="img-circle img-bordered-sm" src="{{ asset("img/" . $comment->user['image'] . "") }}" alt="user-image">
                           <span class="username"> {{ $comment->user["name"] }} </span>
                           <span class="description">{{ $comment->text }}</span>
                      </div>
                    @endforeach

                     <input class="form-control input-sm comment" id="reset"  onchange="creatingComments({{ $key->id }},this)" type="text" placeholder="Type a comment">
                     <br>
                     @endforeach

                  </div>
                </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">

     function creatingComments(idpost , input){
         var value = input.value;
         $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
         $.ajax({
           type: "POST",
           url: '/comments/create',
           data: {idpost:idpost , text:value },
           success: function( msg ) {
             location.reload();
           },
           error: function ( err ){
             console.log(err);
           }
       });
      }

      function likePost(idpost) {

        var value = 1;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "POST",
          url: '/post/like',
          data: {idpost:idpost , value:value },
          success: function( msg ) {
            if (msg) {
              location.reload();
            }
          },
          error: function ( err ){
            console.log(err);
          }
        });

      }
  </script>
@endsection
