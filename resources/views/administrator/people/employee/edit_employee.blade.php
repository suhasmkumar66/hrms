@extends('administrator.master')
@section('title', __('Edit team member'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('TEAM') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>    {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('/people/employees') }}">   {{ __('Team') }}</a></li>
            <li class="active">   {{ __('Edit team member details') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">   {{ __('Edit team member details') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
           <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active" >
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true" onclick="basic()">Basic</a>
  </li>
  <li class="nav-item" >
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false" onclick="personal()">Personal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false" onclick="contact()">Contact</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank"
      aria-selected="false" onclick="bank()">Bank</a>
  </li>
</ul>
            <!-- /.box-header -->

  					<form action="{{ url('people/employees/update/'.$employee['id']) }}" method="post" name="employee_edit_form">
                {{ csrf_field() }}
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
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        
                        <!-- /.Notification Box -->
                        
                        
                        
				
                        <div class="col-md-6" id="tab1">
                            <label for="employee_id">{{ __(' Employee Code') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{ $employee['employee_id'] }}">
                                @if ($errors->has('employee_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="name">{{ __('First Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $employee['name'] }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="joining_position">{{ __(' Department') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_position') ? ' has-error' : '' }} has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                <?php $departments= \App\Department::all();?>
                                     <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    
                                    @foreach($departments as $department)
                                    <option value="{{ $department['id'] }}" {{ ( $department['id'] == $employee['joining_position']) ? 'selected' : '' }}>{{ $department['department'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('joining_position'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_position') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="designation_id">{{ __(' Designation') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }} has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation['id'] }}" {{ ( $designation['id'] == $employee['designation_id']) ? 'selected' : '' }}>{{ $designation['designation'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('designation_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <!-- /.form-group -->
                            <label for="datepicker">{{ __(' Date of Birth') }}</label>
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="{{ $employee['date_of_birth'] }}" id="datepicker3">
                                </div>
                                @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                             <!-- /.form-group -->

                            <label for="gender">{{ __(' Gender') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    <option value="m">{{ __(' Male') }}</option>
                                    <option value="f">{{ __(' Female') }}</option>
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

                        <div class="col-md-6" id="tab2">
                        
                        	
                            <label for="email">{{ __(' Email') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="{{ $employee['email'] }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                            <label for="name">{{ __('Last Name') }}</label>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee['last_name'] }}" placeholder="{{ __('Enter last name..') }}">
                                @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                           
                            <label for="role">{{ __(' Reporting Manager') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('manager') ? ' has-error' : '' }} has-feedback">
                                <select name="manager" id="manager" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    @foreach($users as $user)
                                   
                                    <option value="{{ $user->id }}" {{ ( $user->id == $manager->manager_id ) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('manager'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('manager') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                        
                            <!-- <label for="role">{{ __(' Role') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ ( $role->id == $employee['role'] ) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div> -->

                            <label for="employee_type">{{ __('Employement Status') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('employee_type') ? ' has-error' : '' }} has-feedback">
                                <select name="employee_type" id="employee_type" class="form-control" >
                                     <option value="" selected disabled>{{ __(' Select one') }}</option>
                                     <option value="1">{{ __('Provision') }}</option>
                                     <option value="2" >{{ __('Permanent') }}</option>
                                     <option value="3" >{{ __('Full Time') }}</option>
                                     <option value="4" >{{ __('Part Time') }}</option>
                                     <option value="5" >{{ __('Adhoc') }}</option>
                                 </select>
                                @if ($errors->has('employee_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_type') }}</strong>
                                </span>
                                @endif
                            </div>

                            
                             <label for="contact_no_one">{{ __(' Contact No') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="{{ $employee['contact_no_one'] }}">
                                @if ($errors->has('contact_no_one'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_no_one') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                             <label for="datepicker4">{{ __(' Joining Date') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" value="{{ $employee['joining_date'] }}" class="form-control pull-right" id="datepicker4">
                                </div>
                                @if ($errors->has('joining_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                             
                        </div>
                        <!-- /.col -->
                         </div>
                        <!-- /.row -->
                    </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      		<div class="box-body">
                  			  <div class="row">	
                  			  	
                        <div class="col-md-6" id="tab3">
                            <label for="father_name">{{ __(' Fathers Name') }}</label>
                            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $employee['father_name'] }}" placeholder="Enter father name...">
                                @if ($errors->has('father_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('father_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <label for="spouse_name">{{ __(' Spouse Name') }} </label>
                            <div class="form-group{{ $errors->has('spouse_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="{{ $employee['spouse_name'] }}" placeholder="Enter spouse name...">
                                @if ($errors->has('spouse_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('spouse_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            

                           <label for="spouse_name">{{ __(' Blood Group') }} </label>
                            <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{ $employee['blood_group'] }}" placeholder="Enter blood group...">
                                @if ($errors->has('blood_group'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                </span>
                                @endif
                            </div>

                           <label for="spouse_name">{{ __(' Aadhar No') }} </label>
                            <div class="form-group{{ $errors->has('aadhar_no') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" value="{{ $employee['aadhar_no'] }}" placeholder="Enter aadhar no...">
                                @if ($errors->has('aadhar_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('aadhar_no') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        
                                <div class="col-md-6" id="tab4">
                           <label for="mother_name">{{ __(' Mothers Name') }} </label>
                            <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $employee['mother_name'] }}" placeholder="Enter mother name...">
                                @if ($errors->has('mother_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mother_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="marital_status">{{ __(' Marital Status') }} </label>
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }} has-feedback">
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    <option value="1">{{ __(' Married') }}</option>
                                    <option value="2">{{ __(' Single') }}</option>
                                    <option value="3">{{ __(' Divorced') }}</option>
                                    <option value="4">{{ __(' Separated') }}</option>
                                    <option value="5">{{ __(' Widowed') }}</option>
                                </select>
                                @if ($errors->has('marital_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                                @endif
                            </div>

                            <label for="pan">{{ __(' PAN No') }} </label>
                            <div class="form-group{{ $errors->has('pan_no') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="pan_no" id="pan_no" class="form-control" value="{{ $employee['pan_no'] }}" placeholder="Enter PAN no...">
                                @if ($errors->has('pan_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pan_no') }}</strong>
                                </span>
                                @endif
                            </div>

                          <label for="pan">{{ __(' Passport No') }} </label>
                            <div class="form-group{{ $errors->has('passport') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="passport" id="passport" class="form-control" value="{{ $employee['passport'] }}" placeholder="Enter passport no...">
                                @if ($errors->has('passport'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('passport') }}</strong>
                                </span>
                                @endif
                            </div>

                           
                        </div>
                  	</div>
                  </div>
                 </div> 
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        	<div class="box-body">
                  			  <div class="row">
                  		<div class="col-md-6">
                            <label for="employee_id">{{ __(' Personal Email') }}</label>
                            <div class="form-group{{ $errors->has('personal_email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="personal_email" id="personal_email" class="form-control" value="{{ $employee['personal_email'] }}" placeholder="Enter personal email...">
                                @if ($errors->has('personal_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('personal_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                             <label for="present_address">{{ __(' Present Address') }}</label>
                            <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="present_address" id="present_address" class="form-control" value="{{ $employee['present_address'] }}" placeholder="Enter present address...">
                                @if ($errors->has('present_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('present_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           <label for="joining_position">{{ __(' Emergency Email') }}</label>
                            <div class="form-group{{ $errors->has('emergency_email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="emergency_email" id="emergency_email" class="form-control" value="{{ $employee['emergency_email'] }}" placeholder="Enter emergency email...">
                                @if ($errors->has('emergency_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emergency_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        
                        		<div class="col-md-6">
                            <label for="permanent_address">{{ __(' Permanent Address') }}</label>
                            <div class="form-group{{ $errors->has('permanent_address') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="{{ $employee['permanent_address'] }}" placeholder="Enter permanent address">
                                @if ($errors->has('permanent_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                           

                            <label for="name">{{ __('Emergency Contact Name') }}</label>
                            <div class="form-group{{ $errors->has('emergency_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="emergency_name" id="emergency_name" class="form-control" value="{{ $employee['emergency_name'] }}" placeholder="Enter emergency contact name...">
                                @if ($errors->has('emergency_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emergency_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

           
                             <label for="emergency_contact">{{ __(' Emergency Contact') }}</label>
                            <div class="form-group{{ $errors->has('emergency_contact') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="{{ $employee['emergency_contact'] }}" placeholder="Enter emergency contact no...">
                                @if ($errors->has('emergency_contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emergency_contact') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                  			   </div>
                  			</div>
                        </div>
                        
                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                        <div class="box-body">
                  			  <div class="row">
                  			<div class="col-md-6">
                            <label for="employee_id">{{ __('Bank Name') }}</label>
                            <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ $employee['bank_name'] }}" placeholder="Enter bank name...">
                                @if ($errors->has('bank_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="name">{{ __('IFSC Code') }}</label>
                            <div class="form-group{{ $errors->has('ifsc_code') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="{{ $employee['ifsc_code'] }}" placeholder="Enter IFSC code...">
                                @if ($errors->has('ifsc_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ifsc_code') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                            	<div class="col-md-6">
                            <label for="employee_id">{{ __('Account No') }}</label>
                            <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="account_no" id="account_no" class="form-control" value="{{ $employee['account_no'] }}" placeholder="Enter account no...">
                                @if ($errors->has('account_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('account_no') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="name">{{ __('City') }}</label>
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="city" id="city" class="form-control" value="{{ $employee['city'] }}" placeholder="Enter city...">
                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                  			   </div>
                  			</div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __(' Update') }}</button>

                        <a href="{{ url('/people/employees') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __(' Cancel') }}</a>
                    </div>
                </form>


            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
    document.forms['employee_edit_form'].elements['gender'].value = "{{ $employee['gender'] }}";
    document.forms['employee_edit_form'].elements['employee_type'].value = {{ $employee['employee_type'] }};
    document.forms['employee_edit_form'].elements['marital_status'].value = "{{ $employee['marital_status'] }}";
    function basic(){
    	document.getElementById("tab1").style.display = "block";
    	document.getElementById("tab2").style.display = "block";
    }
  
    function personal(){
    	document.getElementById("tab1").style.display = "none";
    	document.getElementById("tab2").style.display = "none";
    }
    function contact(){
    	document.getElementById("tab1").style.display = "none";
    	document.getElementById("tab2").style.display = "none";
    }
    function bank(){
    	document.getElementById("tab1").style.display = "none";
    	document.getElementById("tab2").style.display = "none";
    }
        
    </script>
    @endsection
