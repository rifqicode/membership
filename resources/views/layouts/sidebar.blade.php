<!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar ">
     <!-- Sidebar user panel -->
     <div class="user-panel">
       <div class="pull-left image">
         <img src="{{ asset("/img" .'/'. Auth::user()->image ."")}}" class="img-circle" alt="User Image">
       </div>
       <div class="pull-left info">
         <p> {{ Auth::user()->name }}</p>
         <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
       </div>
     </div>
     <!-- search form -->
     <form action="{{ route('searchFriend') }}" method="GET" class="sidebar-form">
       <div class="input-group">
         <input type="text" name="user" class="form-control" placeholder="Search...">
             <span class="input-group-btn">
               <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
               </button>
             </span>
       </div>
     </form>
     <!-- /.search form -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu">
       <li class="header">MAIN NAVIGATION</li>
       <li id="home">
         <a href="{{ route('home') }}">
           <i class="fa fa-th"></i> <span>Dashboard</span>
           <span class="pull-right-container">
             <small class="label pull-right bg-green">new</small>
           </span>
         </a>
       </li>

       <li id="profile">
         <a href="/profile">
           <i class="fa fa-user"></i> <span>Profile</span>
           <span class="pull-right-container">
             @if(Auth::user()->verification == 1)
             @else
             <small class="label pull-right bg-red">complete your data</small>
             @endif
           </span>
         </a>
       </li>

       <li id="room">
         <a href="{{ route('rooms') }}">
           <i class="fa fa-users"></i> <span>Rooms</span>
           <span class="pull-right-container">
             <small class="label pull-right bg-green">new</small>
           </span>
         </a>
       </li>

       <li id="group">
         <a href="/group">
           <i class="fa fa-users"></i> <span>Group</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>

     </ul>
   </section>
   <!-- /.sidebar -->
 </aside>
