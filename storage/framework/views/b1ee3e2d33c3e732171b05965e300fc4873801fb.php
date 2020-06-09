<?php $__env->startSection('title', __('Add Employee')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__(' EMPLOYEE')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a href="<?php echo e(url('/people/employees')); ?>"><?php echo e(__('Employee')); ?></a></li>
            <li class="active"><?php echo e(__('Add Employee')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add Employee')); ?></h3>

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
     
                 <form action="<?php echo e(url('people/employees/store')); ?>" method="post" name="employee_add_form">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
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
                        <!-- /.Notification Box -->

                        <?php 
                       

                      $users = \App\User::orderBy('id', 'desc')->first();
                             $sl=$users->id;

                        ?>

                        <div class="col-md-6">
                            <label for="employee_id"><?php echo e(__('Employee Code')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('employee_id') ? ' has-error' : ''); ?> has-feedback">
<!--                            <input type="hidden" name="employee_id" value="<?php echo e($sl); ?>"> -->
                                <input type="text" class="form-control" name="employee_id" id="employee_id"  value="" placeholder="<?php echo e(__('Enter Employee Code...')); ?>">
									<?php if($errors->has('employee_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('employee_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo e(__('First Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Enter name..')); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="joining_position"><?php echo e(__('Department')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('joining_position') ? ' has-error' : ''); ?> has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $departments= \App\Department::all();?>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department['id']); ?>"><?php echo e($department['department']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('joining_position')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('joining_position')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="designation_id"><?php echo e(__('Designation')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('designation_id') ? ' has-error' : ''); ?> has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($designation['id']); ?>"><?php echo e($designation['designation']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('designation_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('designation_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                         

                            <label for="datepicker"><?php echo e(__('Date of Birth')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('date_of_birth') ? ' has-error' : ''); ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="" id="datepicker" placeholder="<?php echo e(__('yyyy-mm-dd')); ?>">
                                </div>
                                <?php if($errors->has('date_of_birth')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('date_of_birth')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="gender"><?php echo e(__('Gender')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?> has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <option value="m"><?php echo e(__('Male')); ?></option>
                                    <option value="f"><?php echo e(__('Female')); ?></option>
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

                        <div class="col-md-6">
                            <label for="email"><?php echo e(__('Email')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Enter email address..')); ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo e(__('Last Name')); ?></label>
                            <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo e(__('Enter last name..')); ?>">
                                <?php if($errors->has('last_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <input type="hidden" name="home_district" value="None">

       
                            <!-- /.form-group -->

                            <label for="role"><?php echo e(__('Reporting Manager')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('manager') ? ' has-error' : ''); ?> has-feedback">
                                <select name="manager" id="manager" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                   	 <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mngr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mngr->id); ?>"><?php echo e($mngr->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('manager')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('manager')); ?></strong>
                                </span>
                                <?php endif; ?>
                                
                            </div>
                            <!-- /.form-group -->

                          <!--  <label for="role"><?php echo e(__('Role')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?> has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->display_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div> -->
                            <!-- /.form-group -->
                            <label for="gender"><?php echo e(__('Employement Status')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('employee_type') ? ' has-error' : ''); ?> has-feedback">
                                <select name="employee_type" class="form-control" id="employee_type">
                                     <option selected disabled><?php echo e(__('Select One')); ?></option>
                                     <option value="1"><?php echo e(__('Provision')); ?></option>
                                     <option value="2"><?php echo e(__('Permanent')); ?></option>
                                     <option value="3"><?php echo e(__('Full Time')); ?></option>
                                     <option value="4"><?php echo e(__('Part Time')); ?></option>
                                     <option value="5"><?php echo e(__('Adhoc')); ?></option>
                                 </select>
                                <?php if($errors->has('employee_type')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('employee_type')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            

                            <label for="contact_no_one"><?php echo e(__('Contact No')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('contact_no_one') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo e(old('contact_no_one')); ?>" placeholder="<?php echo e(__('Enter contact no..')); ?>">
                                <?php if($errors->has('contact_no_one')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('contact_no_one')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                           <label for="datepicker4"><?php echo e(__('Joining Date')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('joining_date') ? ' has-error' : ''); ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" class="form-control pull-right" id="datepicker4" placeholder="<?php echo e(__('yyyy-mm-dd')); ?>">
                                </div>
                                <?php if($errors->has('joining_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('joining_date')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                    <!-- /.form-group -->
                    
                   

                            
                        </div>
                        <!-- /.col -->
<!--                         <div class="col-md-12"> -->
<!--                             <label for="academic_qualification"><?php echo e(__('Academic Qualification')); ?></label> -->
<!--                             <div class="form-group<?php echo e($errors->has('academic_qualification') ? ' has-error' : ''); ?> has-feedback"> -->
<!--                                 <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="<?php echo e(__('Enter academic qualification..')); ?>"><?php echo e(old('academic_qualification')); ?></textarea> -->
<!--                                 <?php if($errors->has('academic_qualification')): ?> -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong><?php echo e($errors->first('academic_qualification')); ?></strong> -->
<!--                                 </span> -->
<!--                                 <?php endif; ?> -->
<!--                             </div> -->
                            <!-- /.form-group -->

<!--                             <label for="professional_qualification"><?php echo e(__('Professional Qualification')); ?></label> -->
<!--                             <div class="form-group<?php echo e($errors->has('professional_qualification') ? ' has-error' : ''); ?> has-feedback"> -->
<!--                                 <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea" placeholder="<?php echo e(__('Enter professional qualification..')); ?>"><?php echo e(old('professional_qualification')); ?></textarea> -->
<!--                                 <?php if($errors->has('professional_qualification')): ?> -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong><?php echo e($errors->first('professional_qualification')); ?></strong> -->
<!--                                 </span> -->
<!--                                 <?php endif; ?> -->
<!--                             </div> -->
                            <!-- /.form-group -->

<!--                             <label for="experience"><?php echo e(__('Experience')); ?></label> -->
<!--                             <div class="form-group<?php echo e($errors->has('experience') ? ' has-error' : ''); ?> has-feedback"> -->
<!--                                 <textarea name="experience" id="experience" class="form-control textarea" placeholder="<?php echo e(__('Enter experience..')); ?>"><?php echo e(old('experience')); ?></textarea> -->
<!--                                 <?php if($errors->has('experience')): ?> -->
<!--                                 <span class="help-block"> -->
<!--                                     <strong><?php echo e($errors->first('experience')); ?></strong> -->
<!--                                 </span> -->
<!--                                 <?php endif; ?> -->
<!--                             </div> -->
                       
<!--                     </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Add')); ?></button>
                    <a href="<?php echo e(url('/people/employees')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo e(__('Cancel')); ?> </a>
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
    document.forms['employee_add_form'].elements['gender'].value = "<?php echo e(old('gender')); ?>";
    document.forms['employee_add_form'].elements['designation_id'].value = "<?php echo e(old('designation_id')); ?>";
    // document.forms['employee_add_form'].elements['role'].value = "<?php echo e(old('role')); ?>";
    document.forms['employee_add_form'].elements['joining_position'].value = "<?php echo e(old('joining_position')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/people/employee/add_employee.blade.php ENDPATH**/ ?>