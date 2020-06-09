<?php $__env->startSection('title', __('Edit team member')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('TEAM')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i>    <?php echo e(__('Dashboard')); ?></a></li>
            <li><a href="<?php echo e(url('/people/employees')); ?>">   <?php echo e(__('Team')); ?></a></li>
            <li class="active">   <?php echo e(__('Edit team member details')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">   <?php echo e(__('Edit team member details')); ?></h3>

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

  					<form action="<?php echo e(url('people/employees/update/'.$employee['id'])); ?>" method="post" name="employee_edit_form">
                <?php echo e(csrf_field()); ?>

                <div class="col-md-12">
                            <?php if(!empty(Session::get('message'))): ?>
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> <?php echo e(Session::get('message')); ?>

                            </div>
                            <?php elseif(!empty(Session::get('exception'))): ?>
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> <?php echo e(Session::get('exception')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        
                        <!-- /.Notification Box -->
                        
                        
                        
				
                        <div class="col-md-6" id="tab1">
                            <label for="employee_id"><?php echo e(__(' Employee Code')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('employee_id') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo e($employee['employee_id']); ?>">
                                <?php if($errors->has('employee_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('employee_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo e(__('First Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($employee['name']); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="joining_position"><?php echo e(__(' Department')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('joining_position') ? ' has-error' : ''); ?> has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                <?php $departments= \App\Department::all();?>
                                     <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department['id']); ?>" <?php echo e(( $department['id'] == $employee['joining_position']) ? 'selected' : ''); ?>><?php echo e($department['department']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('joining_position')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('joining_position')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="designation_id"><?php echo e(__(' Designation')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('designation_id') ? ' has-error' : ''); ?> has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($designation['id']); ?>" <?php echo e(( $designation['id'] == $employee['designation_id']) ? 'selected' : ''); ?>><?php echo e($designation['designation']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('designation_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('designation_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <!-- /.form-group -->
                            <label for="datepicker"><?php echo e(__(' Date of Birth')); ?></label>
                            <div class="form-group<?php echo e($errors->has('date_of_birth') ? ' has-error' : ''); ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="<?php echo e($employee['date_of_birth']); ?>" id="datepicker3">
                                </div>
                                <?php if($errors->has('date_of_birth')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('date_of_birth')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            
                             <!-- /.form-group -->

                            <label for="gender"><?php echo e(__(' Gender')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?> has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    <option value="m"><?php echo e(__(' Male')); ?></option>
                                    <option value="f"><?php echo e(__(' Female')); ?></option>
                                </select>
                                <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            
                            
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6" id="tab2">
                        
                        	
                            <label for="email"><?php echo e(__(' Email')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo e($employee['email']); ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            
                            <label for="name"><?php echo e(__('Last Name')); ?></label>
                            <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo e($employee['last_name']); ?>" placeholder="<?php echo e(__('Enter last name..')); ?>">
                                <?php if($errors->has('last_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                           
                            <label for="role"><?php echo e(__(' Reporting Manager')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('manager') ? ' has-error' : ''); ?> has-feedback">
                                <select name="manager" id="manager" class="form-control">
                                    <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <option value="<?php echo e($user->id); ?>" <?php echo e(( $user->id == $manager->manager_id ) ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('manager')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('manager')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                        
                            <!-- <label for="role"><?php echo e(__(' Role')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?> has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php echo e(( $role->id == $employee['role'] ) ? 'selected' : ''); ?>><?php echo e($role->display_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div> -->

                            <label for="employee_type"><?php echo e(__('Employement Status')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('employee_type') ? ' has-error' : ''); ?> has-feedback">
                                <select name="employee_type" id="employee_type" class="form-control" >
                                     <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                     <option value="1"><?php echo e(__('Provision')); ?></option>
                                     <option value="2" ><?php echo e(__('Permanent')); ?></option>
                                     <option value="3" ><?php echo e(__('Full Time')); ?></option>
                                     <option value="4" ><?php echo e(__('Part Time')); ?></option>
                                     <option value="5" ><?php echo e(__('Adhoc')); ?></option>
                                 </select>
                                <?php if($errors->has('employee_type')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('employee_type')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            
                             <label for="contact_no_one"><?php echo e(__(' Contact No')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('contact_no_one') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo e($employee['contact_no_one']); ?>">
                                <?php if($errors->has('contact_no_one')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('contact_no_one')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            
                             <label for="datepicker4"><?php echo e(__(' Joining Date')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('joining_date') ? ' has-error' : ''); ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" value="<?php echo e($employee['joining_date']); ?>" class="form-control pull-right" id="datepicker4">
                                </div>
                                <?php if($errors->has('joining_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('joining_date')); ?></strong>
                                </span>
                                <?php endif; ?>
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
                            <label for="father_name"><?php echo e(__(' Fathers Name')); ?></label>
                            <div class="form-group<?php echo e($errors->has('father_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo e($employee['father_name']); ?>" placeholder="Enter father name...">
                                <?php if($errors->has('father_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('father_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <label for="spouse_name"><?php echo e(__(' Spouse Name')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('spouse_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="<?php echo e($employee['spouse_name']); ?>" placeholder="Enter spouse name...">
                                <?php if($errors->has('spouse_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('spouse_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            

                           <label for="spouse_name"><?php echo e(__(' Blood Group')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('blood_group') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="blood_group" id="blood_group" class="form-control" value="<?php echo e($employee['blood_group']); ?>" placeholder="Enter blood group...">
                                <?php if($errors->has('blood_group')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('blood_group')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                           <label for="spouse_name"><?php echo e(__(' Aadhar No')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('aadhar_no') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" value="<?php echo e($employee['aadhar_no']); ?>" placeholder="Enter aadhar no...">
                                <?php if($errors->has('aadhar_no')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('aadhar_no')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>


                        </div>
                        
                                <div class="col-md-6" id="tab4">
                           <label for="mother_name"><?php echo e(__(' Mothers Name')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('mother_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?php echo e($employee['mother_name']); ?>" placeholder="Enter mother name...">
                                <?php if($errors->has('mother_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('mother_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="marital_status"><?php echo e(__(' Marital Status')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('marital_status') ? ' has-error' : ''); ?> has-feedback">
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="" selected disabled><?php echo e(__(' Select one')); ?></option>
                                    <option value="1"><?php echo e(__(' Married')); ?></option>
                                    <option value="2"><?php echo e(__(' Single')); ?></option>
                                    <option value="3"><?php echo e(__(' Divorced')); ?></option>
                                    <option value="4"><?php echo e(__(' Separated')); ?></option>
                                    <option value="5"><?php echo e(__(' Widowed')); ?></option>
                                </select>
                                <?php if($errors->has('marital_status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('marital_status')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <label for="pan"><?php echo e(__(' PAN No')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('pan_no') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="pan_no" id="pan_no" class="form-control" value="<?php echo e($employee['pan_no']); ?>" placeholder="Enter PAN no...">
                                <?php if($errors->has('pan_no')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('pan_no')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                          <label for="pan"><?php echo e(__(' Passport No')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('passport') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="passport" id="passport" class="form-control" value="<?php echo e($employee['passport']); ?>" placeholder="Enter passport no...">
                                <?php if($errors->has('passport')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('passport')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                           
                        </div>
                  	</div>
                  </div>
                 </div> 
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        	<div class="box-body">
                  			  <div class="row">
                  		<div class="col-md-6">
                            <label for="employee_id"><?php echo e(__(' Personal Email')); ?></label>
                            <div class="form-group<?php echo e($errors->has('personal_email') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="personal_email" id="personal_email" class="form-control" value="<?php echo e($employee['personal_email']); ?>" placeholder="Enter personal email...">
                                <?php if($errors->has('personal_email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('personal_email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                             <label for="present_address"><?php echo e(__(' Present Address')); ?></label>
                            <div class="form-group<?php echo e($errors->has('present_address') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="present_address" id="present_address" class="form-control" value="<?php echo e($employee['present_address']); ?>" placeholder="Enter present address...">
                                <?php if($errors->has('present_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('present_address')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="joining_position"><?php echo e(__(' Emergency Email')); ?></label>
                            <div class="form-group<?php echo e($errors->has('emergency_email') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="emergency_email" id="emergency_email" class="form-control" value="<?php echo e($employee['emergency_email']); ?>" placeholder="Enter emergency email...">
                                <?php if($errors->has('emergency_email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('emergency_email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        
                        		<div class="col-md-6">
                            <label for="permanent_address"><?php echo e(__(' Permanent Address')); ?></label>
                            <div class="form-group<?php echo e($errors->has('permanent_address') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="<?php echo e($employee['permanent_address']); ?>" placeholder="Enter permanent address">
                                <?php if($errors->has('permanent_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('permanent_address')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                           

                            <label for="name"><?php echo e(__('Emergency Contact Name')); ?></label>
                            <div class="form-group<?php echo e($errors->has('emergency_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="emergency_name" id="emergency_name" class="form-control" value="<?php echo e($employee['emergency_name']); ?>" placeholder="Enter emergency contact name...">
                                <?php if($errors->has('emergency_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('emergency_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

           
                             <label for="emergency_contact"><?php echo e(__(' Emergency Contact')); ?></label>
                            <div class="form-group<?php echo e($errors->has('emergency_contact') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="<?php echo e($employee['emergency_contact']); ?>" placeholder="Enter emergency contact no...">
                                <?php if($errors->has('emergency_contact')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('emergency_contact')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                  			   </div>
                  			</div>
                        </div>
                        
                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                        <div class="box-body">
                  			  <div class="row">
                  			<div class="col-md-6">
                            <label for="employee_id"><?php echo e(__('Bank Name')); ?></label>
                            <div class="form-group<?php echo e($errors->has('bank_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo e($employee['bank_name']); ?>" placeholder="Enter bank name...">
                                <?php if($errors->has('bank_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo e(__('IFSC Code')); ?></label>
                            <div class="form-group<?php echo e($errors->has('ifsc_code') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo e($employee['ifsc_code']); ?>" placeholder="Enter IFSC code...">
                                <?php if($errors->has('ifsc_code')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('ifsc_code')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            </div>
                            	<div class="col-md-6">
                            <label for="employee_id"><?php echo e(__('Account No')); ?></label>
                            <div class="form-group<?php echo e($errors->has('account_no') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="account_no" id="account_no" class="form-control" value="<?php echo e($employee['account_no']); ?>" placeholder="Enter account no...">
                                <?php if($errors->has('account_no')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('account_no')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo e(__('City')); ?></label>
                            <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="city" id="city" class="form-control" value="<?php echo e($employee['city']); ?>" placeholder="Enter city...">
                                <?php if($errors->has('city')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            </div>
                  			   </div>
                  			</div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__(' Update')); ?></button>

                        <a href="<?php echo e(url('/people/employees')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__(' Cancel')); ?></a>
                    </div>
                </form>


            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
    document.forms['employee_edit_form'].elements['gender'].value = "<?php echo e($employee['gender']); ?>";
    document.forms['employee_edit_form'].elements['employee_type'].value = <?php echo e($employee['employee_type']); ?>;
    document.forms['employee_edit_form'].elements['marital_status'].value = "<?php echo e($employee['marital_status']); ?>";
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/people/employee/edit_employee.blade.php ENDPATH**/ ?>