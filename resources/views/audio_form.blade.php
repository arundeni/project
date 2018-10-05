@extends('layout.master')
@section('main_content')
@section('content_header')
<section class="content-header">
  <h1>
    Audio_details
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{URL::to('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Audio_form</li>
  </ol>
</section>
@endsection
<!-- general form elements disabled -->
<div class="box box-warning">

  <!-- /.box-header -->
  <div class="box-body">
    @if(Request::segment(4)=='edit')
            {{ FORM::open(['url'=>'/home/audio/'.$editaudio['id'].'/update','role'=>'form','method'=>'post','files'=>'true','enctype'=>'multipart/form-data']) }}
            @else
            {{ FORM::open(['url'=>'/home/audio_form/save','method'=>'post','role'=>'form','files'=>'true','enctype'=>'multipart/form-data']) }}
            @endif
            {{csrf_field()}}
            @php
            $dat=count($data);
            @endphp
      <!-- text input -->
      <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
        <label>Title</label>
        {{ FORM::hidden('id',(!empty($editaudio['id'])) ? $editaudio['id'] : null,['class'=>'audioid','id'=>'audioid']) }}
        {{ FORM::text('title',(!empty($editaudio['title'])) ? $editaudio['title'] : null,['class'=>'form-control form-control-line','placeholder'=>'Enter title....']) }}
        @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>

      <!-- textarea -->
      <div class="form-group  {{ ($errors->has('description')) ? 'has-error' : '' }}">
        <label>Description</label>
        {{ FORM::textarea('description',(!empty($editaudio['description'])) ? $editaudio['description'] : '', ['class'=>'form-control', 'placeholder'=>'Enter Your Description','rows'=>'10']) }}
        @if($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
      </div>


                @if(!empty($editaudio['song']))
                @php
                $s=array();
                $s=  $editaudio->song;

                $area = json_decode($s, true);
                $i=0;
                @endphp
                @foreach($area as $areas)
                <div class="form-group" data_id="{{ $i }}">
                  {{ FORM::text('song',$areas ? $areas : null,['class'=>'form-control form-control-line','id'=>'txt','disabled'=>""]) }}</br>
                  <div class="audstyle">
                  <audio height="100px" data_id="{{ $i }}" name="sng" controls><source src="{{ asset('/files/'.$areas) }}"  type="video/mp4"/></audio>

                  <a class="btn btn-danger btn-icon-anim btn-square delete" id="delete" data_id="{{ $i }}" style="margin-bottom:33px"><i class="fa fa-trash"></i></a>
                </div>
              </div>
                  <input type="hidden" class="form-control song" id="data" name="sss" value="{{ $i }}">
                  <input type="file" class="form-control song" id="song" name="songs[]">
                  @php
                  $i+=1;
                  @endphp
                  @endforeach
                  <!-- <div class="input-group-btn"> -->
                  <div class="input-group control-group increment">
                  <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add Songs</button>
                  </div>
                  @else
                  <div class="input-group control-group increment">
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add Songs</button>
                  </div>
                  @endif
              <!-- </div> -->
              <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                  <input type="file" name="song[]">
                  <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                </div>

                <div class="form-group">
                  @if(!empty($editaudio['image']))
                    <img src="{{ asset('/images/'.$editaudio->image)}}" width="200" height="200" class="img"/></br>
                    <button type="button" class="btn btn-default" id="btnimage">Change image</button>
                    <input type="file" name="imge" id="image">
                    @else
                  <label>Image</label>
                <input type="file" name="image">
                @endif
                  </div>
  </div>
                  <div class="box-footer">
                <a href="{{ URL::to('/home')}}" type="button" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info" id="btnadd">Add</button>
              </div>

    {{ FORM::close()}}
  </div>
  <!-- /.box-body -->
@endsection
@section('bottom_js')
<script type="text/javascript">
    $(document).ready(function() {
      $("#image").hide();
      $(".song").hide();
      var csrf  = $('meta[name="csrf-token"]').attr('content');

      var base_url =$('meta[name="base-url"]').attr('content');
      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });
      $(".img").dblclick(function()
    {
      $("#image").click();
    });
        $('#image').on('change', function (){
      readFile(this);
    });
    $('#btnsong').click(function()
    {
    $("#song").click();
    });
    $('#btnimage').click(function()
    {
      $("#image").click();
    });
    $('.delete').click(function(){
  var song_id = $(this).attr('data_id');

  var dat_id = $("#audioid").val();

$.ajax({
                   type:'GET',
                   success:function(){
                     $("[data_id="+song_id+"]").remove();

                     alert("Deleted successfully !");
                        }
                 });

$('#btnadd').click(function(){

var dat_id = $("#audioid").val();


$.ajax({
             type:'GET',
             url: base_url +'/home/audio_form/'+dat_id+'/delete/'+song_id,
             success:function(){
               $("[data_id="+song_id+"]").remove();
               alert("Deleted successfully !");
                                  }

});
});
    });
  });
</script>
@endsection
