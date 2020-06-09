@extends('administrator.master')
@section('title', __('Employee'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('Employee') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Employee') }}</a></li>
            <li class="active">{{ __('Employee') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Employee') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div  class="col-md-1">
                    <a href="{{ url('/people/employees/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>{{ __(' Add') }} </a>
                </div>
                
                <div  class="col-md-9">
                    <input type="text" id="myInput" class="form-control search-float" placeholder="{{ __('Search..') }}">
                </div>
                <!-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div  class="col-md-1">
                <input type="file" name="file" class="form-control">
            </div>
                <div  class="col-md-1">
                <button class="btn btn-success">Import User Data</button>
            </div>
                
            </form> -->
            <div  class="col-md-1">
                  <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Import</button>
                </div>
				<div  class="col-md-1">
                  <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                        <i class="fa fa-print"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                    </button>
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
        <div id="printable_area" class="col-md-12 table-responsive">
               <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __(' SL#') }}</th>
                            <th>{{ __(' ID') }}</th>
                            <th>{{ __(' Name') }}</th>
                            <th>{{ __(' Designation') }}</th>
                            <th>{{ __(' Contact No') }}</th>
                            <th class="text-center">{{ __('Added') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php $sl = 1; @endphp
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $employee['employee_id'] }}</td>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['designation'] }}</td>
                            <td>{{ $employee['contact_no_one'] }}</td>
                            <td class="text-center">{{ date("d F Y", strtotime($employee['created_at'])) }}</td>
                           
                            <td class="text-center">
                               <a href="{{ url('/people/employees/edit/' . $employee['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                            </td>
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
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
     <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import Employee</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="file" class="form-control">
      <div class="modal-footer">
        <button class="btn btn-success">Import User Data</button>
      </div>
    </div>

  </div>
</form>
</div>
</div>
</div>
@endsection