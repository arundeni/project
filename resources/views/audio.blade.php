@extends('layout.master')
@section('top_css')
<!-- DataTables -->
<!-- <link rel="stylesheet" href="../../"> -->
{{ HTML::style('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
@endsection
@section('main_content')
@section('content_header')
<section class="content-header">
  <h1>
    Audio Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Audio Details</li>
  </ol>
</section>
@endsection
<!-- /.box -->

<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <div class="box-footer">
<a href="{{ URL::to('home/audio_form') }}" type="submit" class="btn btn-info pull-right">Add</a>
</div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>NO</th>
            <th>IMAGE</th>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>SONGS</th>
            <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
                        @php
                        $dat=count($data);
                        @endphp
                        @php
                        $i=1;


                        @endphp
                        @foreach($audiolist as $audiolists)
                          <tr class="odd gradeX">

                            <td class="slno"> {{$i}} </td>
                            <td><img src="{{ asset('/images/'.$audiolists->image) }}"/></td>
                            <td> {{$audiolists->title}}</br></br></br>
                              @foreach ($audiolists->child_audio as $child)
                                <a href="#" class="dark strong">created by</a>
                                    {{ $child->user }} <br/>
                                <a href="#" class="dark strong">created at</a>
                                  <small>{{ Carbon\Carbon::parse($audiolists->created_at)->format('Y-m-d')}}</small></br>
                                    </br/>
                                @endforeach
                                </td>
                                <td> {{ $audiolists->description }} </td>

                                @php

                                $area = json_decode($data[$i-1], true);

                                @endphp
                                <td>
                                @foreach($area as $areas)
                                {{ $areas }}</br>
                                <!-- <audio height="200px" controls> <source src="{{ asset('/files/'.$areas) }}"/></audio></br> -->
                                @endforeach
                                </td>
                                <td class="status">
                                  <a href="{{ URL::to('/home/audio/'.$audiolists->id.'/edit') }}" class="btn btn-warning btn-icon-anim btn-square" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                  <a href="{{ URL::to('/home/audio/'.$audiolists->id.'/delete') }}" class="btn btn-danger btn-icon-anim btn-square" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-trash"></i></a>
                                </td>
                                </tr>
                                @php
                                $i+=1;
                                @endphp
                                @endforeach
                      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
@section('bottom_js')

<!-- DataTables -->
<!-- <script src="../../"></script> -->
{{ HTML::script('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}

<!-- <script src="../../"></script> -->
{{ HTML::script('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
