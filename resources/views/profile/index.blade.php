@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       User Profile
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Examples</a></li>
       <li class="active">User profile</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <div class="row">
       <div class="col-md-3">

         <!-- Profile Image -->
         <div class="box box-primary">
           <div class="box-body box-profile">
             <img class="profile-user-img img-responsive img-circle" src="{{ asset("/img" .'/'. Auth::user()->image ."")}}" alt="User profile picture">

             <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

             <p class="text-muted text-center">Software Engineer</p>

             <ul class="list-group list-group-unbordered">
               <li class="list-group-item">
                 <b>Followers</b> <a class="pull-right">1,322</a>
               </li>
               <li class="list-group-item">
                 <b>Following</b> <a class="pull-right">543</a>
               </li>
               <li class="list-group-item">
                 <b>Friends</b> <a class="pull-right">13,287</a>
               </li>
             </ul>

             <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

         <!-- /.box -->
       </div>
       <!-- /.col -->
       <div class="col-md-9">
         <div class="nav-tabs-custom">
           <ul class="nav nav-tabs">
             <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
             <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
           </ul>
           <div class="tab-content">
             <div class="active tab-pane" id="activity">
               <!-- Post -->
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
                 <div class="user-block body-post">
                    <img class="img-circle img-bordered-sm" src="{{ asset("img/" . $key->user['image'] . "") }}" alt="user-image">
                          <span class="username">
                            <a href="#"> {{ $key->user["name"] }} </a>
                          </span>
                        <span class="description"> {{ $key->created_at }}</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                      {{ $key->text }}
                  </p>
                  <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> {{ $key->like }} Like </a></li>
                      <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>5</a></li>
                  </ul>

                @foreach ($key->comment as $comment)
                  <div class="user-block body-post">
                         <img class="img-circle img-bordered-sm" src="{{ asset("img/" . $key->user['image'] . "") }}" alt="user-image">
                         <span class="username"> {{ $comment->user["name"] }} </span>
                         <span class="description">{{ $comment->text }}</span>
                   </div>
                 @endforeach

                  <input class="form-control input-sm comment" id="reset"  onchange="creatingComments({{ $key->id }}  , this)" type="text" placeholder="Type a comment">
                  <br>
                  @endforeach

               </div>
           </div>

             <!-- /.tab-pane -->
             <div class="tab-pane" id="timeline">
               <!-- The timeline -->
               <ul class="timeline timeline-inverse">
                 <!-- timeline time label -->
                 <li class="time-label">
                       <span class="bg-red">
                         10 Feb. 2014
                       </span>
                 </li>
                 <!-- /.timeline-label -->
                 <!-- timeline item -->
                 <li>
                   <i class="fa fa-envelope bg-blue"></i>

                   <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                     <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                     <div class="timeline-body">
                       Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                       weebly ning heekya handango imeem plugg dopplr jibjab, movity
                       jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                       quora plaxo ideeli hulu weebly balihoo...
                     </div>
                     <div class="timeline-footer">
                       <a class="btn btn-primary btn-xs">Read more</a>
                       <a class="btn btn-danger btn-xs">Delete</a>
                     </div>
                   </div>
                 </li>
                 <!-- END timeline item -->
                 <!-- timeline item -->
                 <li>
                   <i class="fa fa-user bg-aqua"></i>

                   <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                     <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                     </h3>
                   </div>
                 </li>
                 <!-- END timeline item -->
                 <!-- timeline item -->
                 <li>
                   <i class="fa fa-comments bg-yellow"></i>

                   <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                     <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                     <div class="timeline-body">
                       Take me to your leader!
                       Switzerland is small and neutral!
                       We are more like Germany, ambitious and misunderstood!
                     </div>
                     <div class="timeline-footer">
                       <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                     </div>
                   </div>
                 </li>
                 <!-- END timeline item -->
                 <!-- timeline time label -->
                 <li class="time-label">
                       <span class="bg-green">
                         3 Jan. 2014
                       </span>
                 </li>
                 <!-- /.timeline-label -->
                 <!-- timeline item -->
                 <li>
                   <i class="fa fa-camera bg-purple"></i>

                   <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                     <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                     <div class="timeline-body">
                       <img src="http://placehold.it/150x100" alt="..." class="margin">
                       <img src="http://placehold.it/150x100" alt="..." class="margin">
                       <img src="http://placehold.it/150x100" alt="..." class="margin">
                       <img src="http://placehold.it/150x100" alt="..." class="margin">
                     </div>
                   </div>
                 </li>
                 <!-- END timeline item -->
                 <li>
                   <i class="fa fa-clock-o bg-gray"></i>
                 </li>
               </ul>
             </div>

             </div>
             <!-- /.tab-pane -->
           </div>
           <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

   </section>
   <!-- /.content -->

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

 </div>
@endsection
