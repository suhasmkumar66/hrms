<?php $__env->startSection('title', __('Leave Application Lists')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('Leave Reports')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Leave')); ?></a></li>
            <li class="active"><?php echo e(__('Leave Application lists')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Leave Application lists')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <button class="btn btn-default btn-flat pull-right" onclick="printDiv('printable_area')"><i class="fa fa-print"></i> <?php echo e(__('Print')); ?></button>
                    <a href="<?php echo e(url('/hrm/leave-reports/pdf-reports')); ?>" class="btn btn-info btn-flat pull-right"><i class="fa fa-print"></i><?php echo e(__('PDF')); ?> </a>
                </div>
                <br><br>
                <div id="printable_area" class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo e(__('SL')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Designation')); ?></th> 
                                <th><?php echo e(__('Total Attendance')); ?></th>
                                <th><?php echo e(__('Total Absence')); ?></th>
                                <th><?php echo e(__('On Casual Leave')); ?></th>
                                <th><?php echo e(__('On Earned Leave')); ?></th>
                                <th><?php echo e(__('On Advance Leave')); ?></th>
                                <th><?php echo e(__('On Special Leave')); ?></th>
                                <th><?php echo e(__('Total Leave')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ($sl = 1); ?>
                            <?php ($total_leave = 0); ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sl++); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->employee_id); ?></td>
                                <td><?php echo e($user->designation); ?></td>
                                <td>
                                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $attendance->user_id): ?>
                                    <?php echo e($attendance->total_attendances); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $absences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $absence->user_id): ?>
                                    <?php echo e($absence->total_absences); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $casual_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casual_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $casual_leave->user_id): ?>
                                    <?php echo e($casual_leave->total_casual_leaves); ?>

                                    <?php ($total_leave += $casual_leave->total_casual_leaves); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $earned_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earned_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $earned_leave->user_id): ?>
                                    <?php echo e($earned_leave->total_earned_leaves); ?>

                                    <?php ($total_leave += $earned_leave->total_earned_leaves); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td> 
                                <td>
                                    <?php $__currentLoopData = $advance_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advance_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $advance_leave->user_id): ?>
                                    <?php echo e($advance_leave->total_advance_leave); ?>

                                    <?php ($total_leave += $advance_leave->total_advance_leave); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td> 
                                <td>
                                    <?php $__currentLoopData = $special_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $special_leave->user_id): ?>
                                    <?php echo e($special_leave->total_special_leave); ?>

                                    <?php ($total_leave += $special_leave->total_special_leave); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php echo e($total_leave); ?>

                                    <?php ($total_leave = 0); ?>
                                </td>
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

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/leave_application/leave_report.blade.php ENDPATH**/ ?>