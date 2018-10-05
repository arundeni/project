@extends('layout.master')
@section('main_content')
@section('content_header')
<section class="content-header">
  <h1>
    User_Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User_Form</li>
  </ol>
</section>
@endsection
<div class="box box-warning">
  <!-- /.box-header -->
  <div class="box-body">
    @if(Request::segment(2)=="edit")
            {{ FORM::open(['url'=>'/home/user/update/'.$edituser['id'],'method'=>'POST','role'=>'form','class'=>'form-horizontal form-material']) }}
            @else
              {{ FORM::open(['url'=>'/home/user_form/save','method'=>'POST','role'=>'form']) }}
              @endif
      <!-- text input -->

      <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
        <label>Full Name</label>
        {{ FORM::text('name',(!empty($edituser['name'])) ? $edituser['name'] : null,['class'=>'form-control form-control-line','placeholder'=>'Enter full name....']) }}
        @if($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <!-- textarea -->
      <div class="form-group  {{ ($errors->has('email')) ? 'has-error' : '' }}">
        <label>Email</label>
        {{ FORM::text('email',(!empty($edituser['email'])) ? $edituser['email'] :null,['class'=>'form-control form-control-line','placeholder'=>'Enter email....']) }}
        @if($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="form-group  {{ ($errors->has('phoneno')) ? 'has-error' : '' }}">
        <label>Mobile No</label>
        {{ FORM::text('phoneno',(!empty($edituser['phoneno'])) ? $edituser['phoneno'] :null,['class'=>'form-control form-control-line','placeholder'=>'Enter phoneno....']) }}
        @if($errors->has('phoneno'))
        <span class="help-block">{{ $errors->first('phoneno') }}</span>
        @endif
      </div>

      <div class="form-group  {{ ($errors->has('department')) ? 'has-error' : '' }}">
        <label>Department</label>
        {{ FORM::text('department',(!empty($edituser['department'])) ? $edituser['department'] :null,['class'=>'form-control form-control-line','placeholder'=>'Enter department....']) }}
        @if($errors->has('department'))
        <span class="help-block">{{ $errors->first('department') }}</span>
        @endif
      </div>

      <div class="form-group  {{ ($errors->has('username')) ? 'has-error' : '' }}">
        <label>Username</label>
        {{ FORM::text('username',(!empty($edituser['username'])) ? $edituser['username'] :null,['class'=>'form-control form-control-line','placeholder'=>'Enter username....']) }}
        @if($errors->has('username'))
        <span class="help-block">{{ $errors->first('username') }}</span>
        @endif
      </div>

      <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
        <label>Password</label>
        {{ FORM::text('password',(!empty($edituser['password'])) ? $edituser['password'] : '',['class'=>'form-control form-control-line','placeholder'=>'Enter password....']) }}
        @if($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>

                  <div class="box-footer">
                <a href="{{ URL::to('/home')}}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info">Add</button>
              </div>

    {{ FORM::close()}}
  </div>
  <!-- /.box-body -->
@endsection
