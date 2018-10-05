<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Namadhu TV | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
  <!-- Font Awesome -->
  {{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css') }}
  <!-- Ionicons -->
  {{ HTML::style('assets/bower_components/Ionicons/css/ionicons.min.css') }}
  <!-- Theme style -->
  {{ HTML::style('assets/dist/css/AdminLTE.min.css') }}
  <!-- iCheck -->
  {{ HTML::style('assets/plugins/iCheck/square/blue.css') }}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" id="img-holder">
<div class="login-box">

  <div class="login-logo" id="login-logo">
    <a href="../../index2.html"><b>Namadhu </b>TV</a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    {{ FORM::open(['url'=>'/auth','method'=>'POST']) }}

      <div class="form-group has-feedback {{ ($errors->has('email')) ? 'has-error' : '' }}">
        {{ FORM::text('email','',['placeholder'=>'email','class'=>'form-control']) }}
          @if($errors->has('email'))
          <span class="help-block with-errors">{{ $errors->first('email') }}</span>
          @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {{ ($errors->has('password')) ? 'has-error' : '' }}">
        {{ FORM::password('password',['placeholder'=>'password','class'=>'form-control']) }}
        @if($errors->has('password'))
        <span class="help-block with-errors">{{ $errors->first('password') }}</span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    {{ FORM::close() }}


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
  {{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
<!-- Bootstrap 3.3.7 -->
{{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
<!-- iCheck -->
{{ HTML::script('assets/plugins/iCheck/icheck.min.js') }}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
