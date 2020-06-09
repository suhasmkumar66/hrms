@extends('administrator.master')
@section('title', __('Add Employee'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __(' EMPLOYEE') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a href="{{ url('/people/employees') }}">{{ __('Employee') }}</a></li>
            <li class="active">{{ __('Add Employee') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Add Employee') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
              <ul class="nav nav-tabs">
   				 <li class="active"><a data-toggle="tab" href="#home">Basic</a></li>
<!--     			 <li class="disabled"><a data-toggle="tab" class="nav-link disabled" href="#">Personal</a></li> -->
<!--     			 <li class="disabled"><a data-toggle="tab"  class="nav-link disabled" href="#">Contact</a></li> -->
<!--     			 <li class="disabled"><a data-toggle="tab" class="nav-link disabled" href="#">Bank Details</a></li> -->
  			</ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
                 <form action="{{ url('people/employees/store') }}" method="post" name="employee_add_form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
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

                        <?php 
                       

                      $users = \App\User::orderBy('id', 'desc')->first();
                             $sl=$users->id;

                        ?>

                        <div class="col-md-6">
                            <label for="employee_id">{{ __('Employee Code') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
<!--                            <input type="hidden" name="employee_id" value="{{$sl}}"> -->
                                <input type="text" class="form-control" name="employee_id" id="employee_id"  value="" placeholder="{{ __('Enter Employee Code...') }}">
									@if ($errors->has('employee_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="name">{{ __('First Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Enter name..') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="joining_position">{{ __('Department') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_position') ? ' has-error' : '' }} has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <?php $departments= \App\Department::all();?>
                                    @foreach($departments as $department)
                                    <option value="{{ $department['id'] }}">{{ $department['department'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('joining_position'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_position') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="designation_id">{{ __('Designation') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }} has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('designation_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                         

                            <label for="datepicker">{{ __('Date of Birth') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="" id="datepicker" placeholder="{{ __('yyyy-mm-dd') }}">
                                </div>
                                @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="gender">{{ __('Gender') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="m">{{ __('Male') }}</option>
                                    <option value="f">{{ __('Female') }}</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('Enter email address..') }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="name">{{ __('Last Name') }}</label>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="{{ __('Enter last name..') }}">
                                @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <input type="hidden" name="home_district" value="None">

       
                            <!-- /.form-group -->

                            <label for="role">{{ __('Reporting Manager') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('manager') ? ' has-error' : '' }} has-feedback">
                                <select name="manager" id="manager" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                   	 @foreach($managers as $mngr)
                                    <option value="{{ $mngr->id }}">{{ $mngr->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('manager'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('manager') }}</strong>
                                </span>
                                @endif
                                
                            </div>
                            <!-- /.form-group -->

                          <!--  <label for="role">{{ __('Role') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div> -->
                            <!-- /.form-group -->
                            <label for="gender">{{ __('Employement Status') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('employee_type') ? ' has-error' : '' }} has-feedback">
                                <select name="employee_type" class="form-control" id="employee_type">
                                     <option selected disabled>{{ __('Select One') }}</option>
                                     <option value="1">{{ __('Provision') }}</option>
                                     <option value="2">{{ __('Permanent') }}</option>
                                     <option value="3">{{ __('Full Time') }}</option>
                                     <option value="4">{{ __('Part Time') }}</option>
                                     <option value="5">{{ __('Adhoc') }}</option>
                                 </select>
                                @if ($errors->has('employee_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_type') }}</strong>
                                </span>
                                @endif
                            </div>
                            

                            <label for="contact_no_one">{{ __('Contact No') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="{{ old('contact_no_one') }}" placeholder="{{ __('Enter contact no..') }}">
                                @if ($errors->has('contact_no_one'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_no_one') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="datepicker4">{{ __('Joining Date') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" class="form-control pull-right" id="datepicker4" placeholder="{{ __('yyyy-mm-dd') }}">
                                </div>
                                @if ($errors->has('joining_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                    <!-- /.form-group -->
                    
                   

                            
                        </div>
                        <!-- /.col -->
<!--                         <div class="col-md-12"> -->
<!--                             <label for="academic_qualification">{{ __('Academic Qualification') }}</label> -->
<!--                             <div class="form-group{{ $errors->has('academic_qualification') ? ' has-error' : '' }} has-feedback"> -->
<!--                                 <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="{{ __('Enter academic qualification..') }}">{{ old('academic_qualification') }}</textarea> -->
<!--                                 @if ($errors->has('academic_qualification')) -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong>{{ $errors->first('academic_qualification') }}</strong> -->
<!--                                 </span> -->
<!--                                 @endif -->
<!--                             </div> -->
                            <!-- /.form-group -->

<!--                             <label for="professional_qualification">{{ __('Professional Qualification') }}</label> -->
<!--                             <div class="form-group{{ $errors->has('professional_qualification') ? ' has-error' : '' }} has-feedback"> -->
<!--                                 <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea" placeholder="{{ __('Enter professional qualification..') }}">{{ old('professional_qualification') }}</textarea> -->
<!--                                 @if ($errors->has('professional_qualification')) -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong>{{ $errors->first('professional_qualification') }}</strong> -->
<!--                                 </span> -->
<!--                                 @endif -->
<!--                             </div> -->
                            <!-- /.form-group -->

<!--                             <label for="experience">{{ __('Experience') }}</label> -->
<!--                             <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }} has-feedback"> -->
<!--                                 <textarea name="experience" id="experience" class="form-control textarea" placeholder="{{ __('Enter experience..') }}">{{ old('experience') }}</textarea> -->
<!--                                 @if ($errors->has('experience')) -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong>{{ $errors->first('experience') }}</strong> -->
<!--                                 </span> -->
<!--                                 @endif -->
<!--                             </div> -->
                       
<!--                     </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add') }}</button>
                    <a href="{{ url('/people/employees') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i>{{ __('Cancel') }} </a>
                </div>
            </form>
    </div>
    
  
   
  </div>
</div>
            <!-- /.box-header -->

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['employee_add_form'].elements['gender'].value = "{{ old('gender') }}";
    document.forms['employee_add_form'].elements['designation_id'].value = "{{ old('designation_id') }}";
    // document.forms['employee_add_form'].elements['role'].value = "{{ old('role') }}";
    document.forms['employee_add_form'].elements['joining_position'].value = "{{ old('joining_position') }}";
</script>
@endsection
