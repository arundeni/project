@extends('layout.master')
@section('top_css')
<!-- DataTables -->
{{ HTML::style('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
@endsection
@section('main_content')
@section('content_header')
<section class="content-header">
  <h1>
    Video Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Video Details</li>
  </ol>
</section>
@endsection
<!-- /.box -->

<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <div class="box-footer">
<a href="{{ URL::to('home/video_form') }}" type="submit" class="btn btn-info pull-right">Add</a>
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
                                <th>VIDEO</th>
                                <th>ACTION</th>
                            </tr>
      </thead>
      <tbody>

                            @php
                            $i=1;
                            @endphp
                            @foreach($videolist as $videolists)
                              <tr class="odd gradeX">
                                <td> {{$i}} </td>
                                  <td><img src="{{ asset('/images/'.$videolists->image) }}"/></td>
                                  <td> {{$videolists->title}} </br></br></br>
                                    @foreach ($videolists->child_video as $child)

                      <a href="#" class="dark strong">created by</a>
                      {{ $child->user }} <br/>
                      <a href="#" class="dark strong">created at</a>
                      <small>{{ $videolists->created_at }}</small></br>

                    </br/>
                  @endforeach
                                  </td>
                                  <td> {{$videolists->description}} </br></br></br>
                                    @foreach ($videolists->child_video as $child)
                                    <a href="#" class="dark strong">category</a>
                                    {{ $child->category }} <br/>

                    </br/>
                  @endforeach
                                  </td>
                                  <td><video height="200px" controls> <source src="{{ asset('/videos/'.$videolists->video) }}"/></video></td>
                                <td class="status">
                                  <a href="{{ URL::to('/home/video/'.$videolists->id.'/edit') }}" class="btn btn-warning btn-icon-anim btn-square" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                  <a href="{{ URL::to('/home/video/'.$videolists->id.'/delete') }}" class="btn btn-danger btn-icon-anim btn-square" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-trash"></i></a>
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
{{ HTML::script('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}
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
