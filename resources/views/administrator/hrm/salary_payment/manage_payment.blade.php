<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
@extends('administrator.master')
@section('title', __('Manage Salary Payment'))

@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('SALARY PAYMENT') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Salary') }}</a></li>
      <li class="active">{{ __('Manage Salary Payment') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Manage Salary Payment') }}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
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


          <form class="form-horizontal" action="{{ url('/hrm/salary-payments/go') }}" method="post">
            {{ csrf_field() }}

             <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
              <label for="user_id" class="col-sm-3 control-label">{{ __('Department') }}</label>
              <div class="col-sm-6">
                <select name="department_id" id="department_id" class="form-control" onchange="getUsers()">
                  <option selected disabled>{{ __('Select One') }}</option>
                  @foreach($department as $dpt)
                  <option value="{{ $dpt['id'] }}" ><strong>{{ $dpt['department'] }}</strong></option>
                    @endforeach
                  </select>
                  @if ($errors->has('department_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('department_id') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <label for="user_id" class="col-sm-3 control-label">{{ __('Employee Name') }}</label>
              <div class="col-sm-6">
                <select name="user_id" id="user_id" class="form-control">
                  <option selected disabled>{{ __('Select One') }}</option>
                  <!-- @foreach($employees as $employee)
                  <option value="{{ $employee['id'] }}"><strong>{{ $employee['name'] }}</option>
                    @endforeach -->
                  </select>
                  @if ($errors->has('user_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('user_id') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group{{ $errors->has('salary_month') ? ' has-error' : '' }}">
                <label for="salary_month" class="col-sm-3 control-label">{{ __('Select Month') }}</label>
                <div class="col-sm-6">
                  <div class="input-group date">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" name="salary_month" id="monthpicker" class="form-control pull-right" value="{{ old('salary_month')}}" id="datepicker">
                    @if ($errors->has('salary_month'))
                    <span class="help-block">
                      <strong>{{ $errors->first('salary_month') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> {{ __('GO') }}</button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
               @if(Session::get('salary'))
               <div id="printable_area" class="col-md-12 table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
               <th>Sl No</th>
                <th>Name</th>
                <th>CTC</th>
                <th>Gross</th>
               <!--  <th>Working Days</th> -->
                <th>Present Days</th>
                <th>LOP</th>
                <th>Emp Deduction</th>
                <th>LOP Deduction</th>
                <th>Total Deductions</th>
                <th>Net Salary</th>
                <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  
                 @php $sl = 1; @endphp

                 <?php $salary = Session::get('salary'); ?>
                 <?php $salary_month = Session::get('salary_month'); ?>
                    @foreach($salary as $sal)
                <tr>
                  <td>{{ $sl++ }}</td>
                  <td>{{$sal['name']}}</td>
                  <td>{{$sal['gross_salary']}}</td>
                  <td>{{$sal['ctc']}}</td>
                  <!-- <td>{{Helper::getAttendanceDays($sal['user_id'],$salary_month)}} Days</td> -->
                  <td>{{Helper::getPresentDays($sal['user_id'],$salary_month)}} Days</td>
                  <td>{{Helper::getAbsentDays($sal['user_id'],$salary_month)}} Days</td>
                  <td>{{$sal['total_deduction']}}</td>
                  <td>{{Helper::getLOPDeduction($sal['user_id'],$salary_month,$sal['gross_salary'])}}</td>
                  <td>{{Helper::getTotalDeduction($sal['user_id'],$salary_month,$sal['gross_salary'],$sal['total_deduction'])}}</td>
                   <td>{{Helper::getNetSalary($sal['user_id'],$salary_month,$sal['gross_salary'],$sal['total_deduction'],$sal['net_salary'])}}</td>
                  <td class="text-center">
                               <a href="{{ url('/hrm/salary-payments/manage-salary/' . $sal['id']).'/'.'2020-04' }}"><i class="icon fa fa-edit"></i> {{ __('Make Payment') }}</a>
                            </td>
                </tr>
                     @endforeach                   
              </tbody>
              </table>
            </div>
            <form class="form-horizontal" action="{{ url('/bulksalarypayment') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" name="dpt_id" id="dpt_id" value="">
               <input type="hidden" name="month" id="month" value="">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> {{ __('Bulk Payment') }}</button>
                </div>
            @endif
            <!-- /. end form -->
          </div>
        </form>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix"></div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

  <script>
    $(document).ready(function() { 

     let searchParams = new URLSearchParams(window.location.search);
     var dpt=  searchParams.has('dpt_id');
     var month = searchParams.has('month') // true
   if(dpt == true){
     let param = searchParams.get('dpt_id');
     // let monparam = searchParams.get('D');
       $("#dpt_id").val(param[0]);
       $("#month").val('2020-02');
   }
    });
  </script>

  <script type="text/javascript">

   
    
    function getUsers(){
      var department = $("#department_id").val();  
       $.ajax({
        url: "{{ url('/getDepartmentUser') }}",
        type: 'POST',
        data: {_token: '{!! csrf_token() !!}',department_id: department },
        success: function(data){
          $.each(data, function(key, value) {   
          $('#user_id')
         .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name)); 
});

        }
    });
    }
  </script>