@extends('administrator.master')
@section('title', __('Manage Attendance'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('ATTENDANCE') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Attendance') }} </a></li>
            <li class="active">{{ __(' Manage Attendance') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Attendance') }} </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
              <div  class="col-md-11">
              </div>
               <div  class="col-md-1">
                  <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Import</button>
                </div>
                <!-- Notification Box -->
                <div class="col-md-12">
                    @if (!empty(Session::get('message')))
                    <div class="alert alert-success alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                    </div>
                    @elseif (!empty(Session::get('exception')))
                    <div class="alert alert-warning alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                    </div>
                    @endif
                </div>
                <!-- /.Notification Box -->
                <div class="col-md-12">
                    <form action="{{ url('/hrm/attendance/set') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="datepicker">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i>{{ __('Go') }} </button>
                                  </span>
                              </div>
                            </div>
                        </div>
                  </form>
              </div>
              <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
              
          </div>
          <!-- /.box-footer -->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
     <form action="{{ route('attendanceimport') }}" method="POST" enctype="multipart/form-data">
                @csrf
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import Employee Attendance</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="file" class="form-control">
      <div class="modal-footer">
        <button class="btn btn-success">Import Attendance</button>
      </div>
    </div>

  </div>
</form>
</div>
</div>
</div>
@endsection