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
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="post" id="post">

                    <div class="user-block">
                      <form class="form-horizontal" action="{{ route('postCreateDashboard') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="form-group margin-bottom-none">
                          <div class="col-sm-9">
                            <input class="form-control input-sm" name="text" placeholder="Whats Happed Today ??">
                          </div>
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">Post</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    @foreach ($datapost as $key)
                    <div class="user-block">
                       <img class="img-circle img-bordered-sm" src="/img/user1-128x128.jpg" alt="user-image">
                             <span class="username">
                               <a href="#"> {{ $key->user["name"] }} </a>
                             </span>
                           <span class="description"> {{ $key->text }}</span>
                     </div>
                     <!-- /.user-block -->
                     <p>

                     </p>
                     <ul class="list-inline">
                         <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> {{ $key->like }} Like </a></li>
                         <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>5</a></li>
                     </ul>

                   @foreach ($key->comment as $comment)
                     <div class="user-block">
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
     function creatingComments(param , input){
         var value = input.value;
         $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
         $.ajax({
           type: "POST",
           url: '/comments/create',
           data: {idpost:param , text:value },
           success: function( msg ) {
             alert(msg);
             input.value = "";
             location.reload();
           },
           error: function ( err ){
             console.log(err);
           }
       });
      }
  </script>
@endsection
