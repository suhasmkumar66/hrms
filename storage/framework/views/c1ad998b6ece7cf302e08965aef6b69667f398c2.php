<?php $__env->startSection('title', __('Details of Attendense')); ?>
<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo e(__(' Details of Attendense')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i>  <?php echo e(__(' Dashboard')); ?></a></li>
            <li><a> <?php echo e(__(' HRM')); ?></a></li>
            <li class="active"> <?php echo e(__(' Details of Attendense')); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                
                <h3 class="box-title"> <?php echo e(__(' Details of Attendence ')); ?><a href="<?php echo e(url('hrm/attendance/manage')); ?>" class="btn btn-primary"> <?php echo e(__(' Back')); ?></a></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <button class="btn btn-default btn-flat pull-right" onclick="printDiv('printable_area')"><i class="fa fa-print"></i> <?php echo e(__(' Print')); ?> </button>
                    
                </div>
                <br><br>
                <div id="printable_area">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> <?php echo e(__(' SL')); ?></th>
                                <th> <?php echo e(__(' User ID')); ?></th>
                                <th> <?php echo e(__(' Attendend By')); ?></th>
                                <th> <?php echo e(__(' Attendance Date')); ?></th>
                                <th> <?php echo e(__(' Attendance Status')); ?></th>
                                <th> <?php echo e(__(' Leave Category')); ?></th>
                                <th> <?php echo e(__(' In Time')); ?></th>
                                <th> <?php echo e(__(' Out Time')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1;?>
                            
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sl++); ?></td>
                                <td><?php echo e(__('EMP')); ?><?php echo e($attd->id); ?></td>
                                <td><?php echo e(Auth::user()->name); ?></td>
                                <td><?php echo e($attd->attendance_date); ?></td>
                                <td>
                                    <?php if($attd->attendance_status==1): ?>
                                    <b class="btn btn-success"><?php echo e(__('Present')); ?></b>
                                    <?php else: ?>
                                    <b class="btn btn-danger"><?php echo e(__('Absence')); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($attd->leave_category_id==0): ?>
                                    <b class="btn btn-primary"><?php echo e(__('No Leave')); ?></b>
                                    <?php else: ?>
                                    <b class="btn btn-success"><?php echo e(__('Leave')); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($attd->check_in); ?></td>
                                <td><?php echo e($attd->check_out); ?></td>
                                
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\hrm-projects\Laravel-HRMS\resources\views/administrator/hrm/attendance/detailsAttendense.blade.php ENDPATH**/ ?>