@extends('layout.master')
@section('main_content')
@section('content_header')
<section class="content-header">
  <h1>
    Video_details
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Video_Form</li>
  </ol>
</section>
@endsection
<!-- general form elements disabled -->
<div class="box box-warning">

  <!-- /.box-header -->
  <div class="box-body">
    @if(Request::segment(4)=='edit')
          {{ FORM::open(['url'=>'/home/video/'.$editvideo['id'].'/update','method'=>'post','role'=>'form','files'=>'true','enctype'=>'multipart/form-data']) }}
          @else
            {{ FORM::open(['url'=>'/home/video_form/save','method'=>'post','role'=>'form','files'=>'true','enctype'=>'multipart/form-data'])}}
            @endif
      <!-- text input -->
      <div class="form-group {{ ($errors->has('category')) ? 'has-error' : '' }}">
                  <label>Category</label>
                  {{ FORM::select('category', ['new_release'=>'New Release Movie Songs', 'fresh_arrivals'=>'Fresh Arrivals','now_trending'=>'Now Trending','juke_box'=>'Juke Box Compilations','swag_mix'=>'The Swag Mix','Official_playlist'=>'Official Playlist'], (!empty($editvideo['category'])) ? $editvideo['category'] : null, ['class' => 'form-control','placeholder'=>'please select']) }}

                @if ($errors->has('category'))
                <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
                </div>
      <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
        <label>Title</label>
        {{ FORM::hidden('id',(!empty($editvideo['id'])) ? $editvideo['id'] : null,['class'=>'audioid','id'=>'audioid']) }}
        {{ FORM::text('title',(!empty($editvideo['title'])) ? $editvideo['title'] : null,['class'=>'form-control form-control-line','placeholder'=>'Enter title....']) }}
        @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>

      <!-- textarea -->
      <div class="form-group  {{ ($errors->has('description')) ? 'has-error' : '' }}">
        <label>Textarea</label>
        {{ FORM::textarea('description',(!empty($editvideo['description'])) ? $editvideo['description'] : '', ['class'=>'form-control', 'placeholder'=>'Enter Your Description','rows'=>'10']) }}
        @if($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
      </div>

      <div class="form-group">
                  @if(!empty($editvideo['video']))
                  <video height="200px" controls> <source src="{{ asset('/videos/'.$editvideo->video) }}"/></video></br>
                    <button type="button" class="btn btn-default" id="btnvideo">Change video</button>
                    <input type="file" name="video" id="video">
                    @else
                  <label for="video">Video Song <span class="help"></span></label>
                  <input type="file" name="video">
                  @endif
                  </div>

              <div class="form-group">
                </div>

                <div class="form-group">
                  @if(!empty($editvideo['image']))
                    <img src="{{ asset('/uploads/'.$editvideo->image)}}" width="200" height="200" class="img"/></br>
                    <button type="button" class="btn btn-default" id="btnimage">Change image</button>
                    <input type="file" name="image" id="image">
                    @else
                  <label>Image</label>
                <input type="file" name="image">
                @endif
                  </div>
  </div>
                  <div class="box-footer">
                <a href="{{ URL::to('/home') }}" type="button" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info">Add</button>
              </div>

    {{ FORM::close()}}
  </div>
  <!-- /.box-body -->
@endsection
@section('bottom_js')
<script type="text/javascript">

    $(document).ready(function() {
      $("#image").hide();
      $("#video").hide();
      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });
      $('#image').on('change', function (){
      readFile(this);
    });
    $('#btnvideo').click(function()
    {
      $("#video").click();
    });
    $('#btnimage').click(function()
    {
      $("#image").click();
    });

    });

</script>
@endsection
