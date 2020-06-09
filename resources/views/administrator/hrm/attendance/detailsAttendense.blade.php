@extends('administrator.master')
@section('title', __('Details of Attendense'))
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __(' Details of Attendense') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>  {{ __(' Dashboard') }}</a></li>
            <li><a> {{ __(' HRM') }}</a></li>
            <li class="active"> {{ __(' Details of Attendense') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                
                <h3 class="box-title"> {{ __(' Details of Attendence ') }}<a href="{{url('hrm/attendance/manage')}}" class="btn btn-primary"> {{ __(' Back') }}</a></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <button class="btn btn-default btn-flat pull-right" onclick="printDiv('printable_area')"><i class="fa fa-print"></i> {{ __(' Print') }} </button>
                    
                </div>
                <br><br>
                <div id="printable_area">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> {{ __(' SL') }}</th>
                                <th> {{ __(' User ID') }}</th>
                               
                                <th> {{ __(' Attendance Status') }}</th>
                                <th> {{ __(' Leave Category') }}</th>
                                <th> {{ __(' In Time') }}</th>
                                <th> {{ __(' Out Time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1;?>
                            
                            @foreach($attendance as $attd)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{ $attd->attendance_date }}</td>
                                <td>
                                     @if($attd->attendance_status==1)
                                    <b class="btn btn-success">{{ __('Present') }}</b>
                                    @elseif($attd->attendance_status==2)
                                    <b class="btn btn-warning">{{ __('Holiday') }}</b>
                                    @elseif($attd->attendance_status==3)
                                    <b class="btn btn-info">{{ __('Leave') }}</b>
                                    @else
                                    <b class="btn btn-danger">{{ __('Absence') }}</b>
                                    @endif
                                </td>
                                <td>
                                    @if($attd->leave_category_id == 1)
                                    <b class="btn btn-info">{{ __('Sick Leave') }}</b>
                                     @elseif($attd->leave_category_id == 2)
                                    <b class="btn btn-info">{{ __('Earned Leave') }}</b>
                                    @elseif($attd->leave_category_id == 3)
                                    <b class="btn btn-danger">{{ __('LOP') }}</b>
                                    @elseif($attd->leave_category_id == 4)
                                    <b class="btn btn-warning">{{ __('Holiday') }}</b>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>{{ $attd->check_in }}</td>
                                <td>{{ $attd->check_out }}</td>
                                
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection