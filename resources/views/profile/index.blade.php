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
            @if(!$data == NULL)
            <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

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

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                  <span class="description">Shared publicly - 7:30 PM today</span>
                </div>
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
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="post" action="/profile">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="{{ Auth::user()->name }}" disabled="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="full_name" id="inputFullname" >
                  </div>
                </div>

               <div class="form-group">
                 <label for="inputBirthdate" class="col-sm-2 control-label">Birth Date</label>

                 <div class="col-sm-10">
                   <!-- @if($d->birthdate == NULL)
                   <input type="date" class="form-control" name="birthdate" id="inputBirthdate" >
                   @else -->
                   <input type="date" class="form-control" name="birthdate" id="inputBirthdate" >
                   <!-- @endif -->
                 </div>
               </div>

               <div class="form-group">
                 <label for="InputAddress" class="col-sm-2 control-label">Address</label>

                 <div class="col-sm-10">
                   <input type="text" class="form-control" name="address" id="inputAddress">
                 </div>
               </div>

               <div class="form-group">
                 <label for="InputContact" class="col-sm-2 control-label">Contact</label>

                 <div class="col-sm-10">
                   <input type="text" class="form-control" name="contact" id="inputContact">
                 </div>
               </div>


                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            @else
            @foreach($data as $d)
             <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

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

         <!-- About Me Box -->
         <div class="box box-primary">
           <div class="box-header with-border">
             <h3 class="box-title">About Me</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

             <p class="text-muted">
               B.S. in Computer Science from the University of Tennessee at Knoxville
             </p>

             <hr>

             <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

             <p class="text-muted">Malibu, California</p>

             <hr>

             <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

             <p>
               <span class="label label-danger">UI Design</span>
               <span class="label label-success">Coding</span>
               <span class="label label-info">Javascript</span>
               <span class="label label-warning">PHP</span>
               <span class="label label-primary">Node.js</span>
             </p>

             <hr>

             <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
       <div class="col-md-9">
         <div class="nav-tabs-custom">
           <ul class="nav nav-tabs">
             <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
             <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
             <li><a href="#settings" data-toggle="tab">Settings</a></li>
           </ul>
           <div class="tab-content">
             <div class="active tab-pane" id="activity">
               <!-- Post -->
               <div class="post">
                 <div class="user-block">
                   <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                       <span class="username">
                         <a href="#">Jonathan Burke Jr.</a>
                         <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                       </span>
                   <span class="description">Shared publicly - 7:30 PM today</span>
                 </div>
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
             <!-- /.tab-pane -->

             <div class="tab-pane" id="settings">
               <form class="form-horizontal" method="post" action="/profile">
                 {{ csrf_field() }}

                 <div class="form-group">
                   <label for="inputName" class="col-sm-2 control-label">Name</label>

                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="inputName" placeholder="{{ Auth::user()->name }}" disabled="">
                   </div>
                 </div>

                 <div class="form-group">
                   <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                   <div class="col-sm-10">
                     <input type="text" class="form-control" name="full_name" id="inputFullname" placeholder="">
                   </div>
                 </div>

                <div class="form-group">
                  <label for="inputBirthdate" class="col-sm-2 control-label">Birth Date</label>

                  <div class="col-sm-10">
                    <!-- @if($d->birthdate == NULL)
                    <input type="date" class="form-control" name="birthdate" id="inputBirthdate" >
                    @else -->
                    <input type="date" class="form-control" name="birthdate" id="inputBirthdate" value="" >
                    <!-- @endif -->
                  </div>
                </div>

                <div class="form-group">
                  <label for="InputAddress" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="InputContact" class="col-sm-2 control-label">Contact</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="contact" id="inputContact" placeholder="">
                  </div>
                </div>


                 <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-danger">Submit</button>
                   </div>
                 </div>
               </form>
             </div>
            @endforeach
            @endif
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
 </div>
@endsection
