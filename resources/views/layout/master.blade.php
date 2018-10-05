<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="base-url" content="{{ URL::to('/') }}" />
  <title>Namadhu TV </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  @yield('top_css')
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
  <!-- Font Awesome -->
    {{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css') }}
  <!-- Ionicons -->
    {{ HTML::style('assets/bower_components/Ionicons/css/ionicons.min.css') }}
  <!-- Theme style -->
    {{ HTML::style('assets/dist/css/AdminLTE.min.css') }}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    {{ HTML::style('assets/dist/css/skins/_all-skins.min.css') }}
  <!-- Morris chart -->
    {{ HTML::style('assets/bower_components/morris.js/morris.css') }}
  <!-- jvectormap -->
  {{ HTML::style('assets/bower_components/jvectormap/jquery-jvectormap.css') }}
  <!-- Date Picker -->
    {{ HTML::style('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
  <!-- Daterange picker -->
    {{ HTML::style('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}
  <!-- bootstrap wysihtml5 - text editor -->
    {{ HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NAMADHU </b>TV</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        </div> -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
          <li class="active treeview">
          <a href="{{ URL::to('/home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
          <a href="{{ URL::to('/home/audio') }}">
            <i class="fa fa-file-audio-o"></i>
            <span>Audio</span>
          </a>
          </li>
        <li>
          <a href="{{ URL::to('/home/video') }}">
            <i class="fa fa-file-video-o"></i> <span>Video</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gallery</span>
          </a>
        </li>
          @if(Auth::guard('admin')->user())
          <div class="hidden">
        <li class="treeview">
          <a href="{{ URL::to('/home/user') }}">
            <i class="fa fa-user"></i>
            <span>User</span>
          </a>
        </li>
      </div>
      @elseif(Auth::guard('admi')->user())
      <li class="treeview">
        <a href="{{ URL::to('/home/user') }}">
          <i class="fa fa-user"></i>
          <span>User</span>
        </a>
      </li>
      @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content_header')

    <!-- Main content -->
    <section class="content">

  @yield('main_content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>All Rights Reserved by Namadhu tv networks..</strong>
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
<!-- jQuery UI 1.11.4 -->
{{ HTML::script('assets/bower_components/jquery-ui/jquery-ui.min.js') }}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

<!-- Morris.js charts -->
{{ HTML::script('assets/bower_components/raphael/raphael.min.js') }}

{{ HTML::script('assets/bower_components/morris.js/morris.min.js') }}

<!-- Sparkline -->
{{ HTML::script('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}

<!-- jvectormap -->
{{ HTML::script('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}

{{ HTML::script('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}

<!-- jQuery Knob Chart -->
{{ HTML::script('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}

<!-- daterangepicker -->
{{ HTML::script('assets/bower_components/moment/min/moment.min.js') }}

{{ HTML::script('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}

<!-- datepicker -->
{{ HTML::script('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}

<!-- Bootstrap WYSIHTML5 -->
{{ HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

<!-- Slimscroll -->
{{ HTML::script('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}

<!-- FastClick -->
{{ HTML::script('assets/bower_components/fastclick/lib/fastclick.js') }}

<!-- AdminLTE App -->
{{ HTML::script('assets/dist/js/adminlte.min.js') }}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{ HTML::script('assets/dist/js/pages/dashboard.js') }}

<!-- AdminLTE for demo purposes -->
{{ HTML::script('assets/dist/js/demo.js') }}
@yield('bottom_js')
</body>
</html>
