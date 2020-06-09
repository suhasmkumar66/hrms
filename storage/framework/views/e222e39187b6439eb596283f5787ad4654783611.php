<?php $__env->startSection('title', __('Attendance Statement')); ?>
<?php $__env->startSection('main_content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo e(__('Attendance Statement')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a>Attendance</a></li>
            <li class="active"><?php echo e(__('Attendance Statement')); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Attendance Statement')); ?>    </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="btn-body">
                    <a href="<?php echo e(url('/hrm/attendance/details/report/go')); ?>" class="tip btn btn-primary btn-flat"><i class="fa fa-plus"></i><?php echo e(__('add new Attendance Statement')); ?> </a>
                    
                    <form action="<?php echo e(url('/hrm/attendance/details/report/pdf')); ?>" method="get">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="emp_id" value="<?php echo e($empid); ?>">
                        <input type="hidden" name="date1" value="<?php echo e($startdate); ?>">
                        <input type="hidden" name="date2" value="<?php echo e($enddate); ?>">
                        
                        <button type="submit" class="tip btn btn-primary btn-flat"><?php echo e(__('PDF')); ?> </button>
                        
                    </form>
                </div>
                <hr>
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
                
                <div class="st-left-body">
                    <h4>
                    <?php
                    $users= \App\User::all()->where('access_label', 2)->where('id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    $idno=$user->employee_id;
                    $joindate=$user->joining_date;
                    $contact=$user->contact_no_one;
                    $datebirth=$user->date_of_birth;
                    $designation=$user->designation_id;
                    $prsaddress=$user->present_address;
                    $prmaddress=$user->permanent_address;
                    }
                    
                    ?>
                    <?php echo e(__('EMP ID NO:')); ?>  <?php echo e($idno); ?><br>
                    <?php echo e(__('Name:')); ?> <?php echo e($empname); ?><br>
                    <?php $desig= \App\Designation::find($designation)->designation;?>
                    <?php echo e(__('Designation:')); ?> <?php echo e($desig); ?><br>
                    <?php echo e(__('Date of Birth:')); ?> <?php echo e($datebirth); ?><br>
                    <?php echo e(__('Joining Date:')); ?> <?php echo e($joindate); ?><br>
                    <?php echo e(__('Contact:')); ?> <?php echo e($contact); ?><br>
                    </h4>
                </div>
                <div class="st-center-body">
                    <div class="img-body"><img src="<?php echo e(asset('profile_picture/'.auth()->user()->avatar)); ?>" class="img"></div>
                    <h2><?php echo e(__('Attendence Statement')); ?></h2>
                    <center><b><?php echo e(date("F Y", strtotime($startdate))); ?> to <?php echo e(date("F Y", strtotime($enddate))); ?><br>
                    <?php $users= \App\User::all()->where('employee_id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    }
                    
                    ?>
                    
                    </b></center>
                </div>
                <div class="st-right-body">
                    <h4>
                    <?php echo e(__('Present Address: ')); ?><?php echo e($prsaddress); ?><br>
                    <?php echo e(__('Permanent Address:')); ?> <?php echo e($prmaddress); ?>

                    
                    </h4>
                </div>
                <div id="printable_area">
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo e(__('SL')); ?></th>
                                
                                <th><?php echo e(__('Attendance Date')); ?></th>
                                <th><?php echo e(__('Attendance Status')); ?></th>
                                <th><?php echo e(__('Leave Category')); ?></th>
                                <th><?php echo e(__('In Time')); ?></th>
                                <th><?php echo e(__('Out Time')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1;?>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sl++); ?></td>
                                
                                <td><?php echo e($attd->attendance_date); ?></td>
                                <td>
                                    <?php if($attd->attendance_status==1): ?>
                                    <b class="btn btn-success"><?php echo e(__('Present')); ?></b>
                                    <?php elseif($attd->attendance_status==2): ?>
                                    <b class="btn btn-warning"><?php echo e(__('Holiday')); ?></b>
                                    <?php elseif($attd->attendance_status==3): ?>
                                    <b class="btn btn-info"><?php echo e(__('Leave')); ?></b>
                                    <?php else: ?>
                                    <b class="btn btn-danger"><?php echo e(__('Absence')); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($attd->leave_category_id == 1): ?>
                                    <b class="btn btn-info"><?php echo e(__('Sick Leave')); ?></b>
                                     <?php elseif($attd->leave_category_id == 2): ?>
                                    <b class="btn btn-info"><?php echo e(__('Earned Leave')); ?></b>
                                    <?php elseif($attd->leave_category_id == 3): ?>
                                    <b class="btn btn-danger"><?php echo e(__('LOP')); ?></b>
                                    <?php elseif($attd->leave_category_id == 4): ?>
                                    <b class="btn btn-warning"><?php echo e(__('Holiday')); ?></b>
                                    <?php else: ?>
                                    -
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($attd->check_in); ?></td>
                                <td><?php echo e($attd->check_out); ?></td>
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e(__('Total')); ?></th>
                                <th><?php echo e($attendance->count()); ?> days</th>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Total')); ?></th>
                                <th><?php echo e($attds->count()); ?> <?php echo e(__('Present')); ?></th>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Total')); ?></th>
                                <th><?php echo e($abs->count()); ?> <?php echo e(__('Absence')); ?></th>
                            </tr>
                        </tbody>
                    </table>
                    </div><!--printable-->
                    <div class="sign-body-l">-----------------------------------<br><?php echo e(__('Employee')); ?></div>
                    <div class="sign-body-r">-----------------------------------<br><?php echo e(__('Authorized')); ?></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/attendance/detailsAttendenseReport.blade.php ENDPATH**/ ?>