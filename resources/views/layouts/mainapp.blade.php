<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dataTables.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
</head>

<body class="hold-transition fixed skin-purple-light sidebar-mini">

        @include('layouts.navbar')
        @include('flash::message')
        @include('layouts.sidebar')
        @yield('content')

</body>


    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>t>

    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <!-- Slimscroll -->
    <script src="{{('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/app.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.min.js')}}"></script>

    <!-- Setting active sidebar -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">

    var pathArray = window.location.pathname.split( '/' );
    var segment_1 = pathArray[1];
    if (segment_1 != 0) {
        document.getElementById(segment_1).classList.add("active");
    }

    </script>

</body>
</html>
