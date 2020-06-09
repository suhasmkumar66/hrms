<?php $__env->startSection('title', __('Set Attendance')); ?>

<?php $__env->startSection('main_content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__(' ATTENDANCE REPORT')); ?>  
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?>  </a></li>
            <li><a><?php echo e(__('Attendance')); ?> </a></li>
            <li class="active"><?php echo e(__('Attendance Report')); ?> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Attendance Report')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="<?php echo e(url('/hrm/attendance/get-report')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="monthpicker2" value="<?php echo e($date); ?>">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> <?php echo e(__('Go')); ?></button>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /. end col -->
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
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Employee Name')); ?></th>
                            <?php for($i=1; $i<=$number_of_days; $i++): ?>
                            <th class="text-center"><?php echo e($i); ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href="<?php echo e(url('/people/employees/details/' . $employee['id'])); ?>"><?php echo e($employee['name']); ?></a></td>
                            <?php for($i = 1; $i <= $number_of_days; $i++): ?>
                            <td class="text-center">
                                <?php if($i>=1 AND $i<=9): ?>
                                <?php ($day = $date."-0".$i); ?>
                                <?php else: ?>
                                <?php ($day = $date."-".$i); ?>
                                <?php endif; ?>
                                <?php ($day_name = date("D", strtotime($day))); ?>

                                <?php $__currentLoopData = $monthly_holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthly_holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($day == $monthly_holiday['date']): ?>
                                <span class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" data-original-title="<?php echo e($monthly_holiday['holiday_name']); ?>"><?php echo e(__('H')); ?></span>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $weekly_holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekly_holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($day_name == $weekly_holiday['day']): ?>
                                <span class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" data-original-title="Weekly Holiday"><?php echo e(__('H')); ?></span>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($attendance['user_id'] == $employee['id']): ?>
                                <?php if($attendance['attendance_date'] == $day): ?>
                                <?php if($attendance['attendance_status'] == 1): ?>
                                <span class="btn btn-xs btn-success btn-flat" data-toggle="tooltip" data-original-title="Present"> <?php echo e(__('P')); ?> </span>
                                <?php endif; ?>
                                <?php if($attendance['attendance_status'] == 0): ?>
                                
                                <?php if($attendance['leave_category_id'] == 0): ?>
                                <span class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" data-original-title="Absence"><?php echo e(__('A')); ?></span> 
                                <?php else: ?>
                                <span class="btn btn-xs btn-info btn-flat" data-toggle="tooltip" data-original-title="<?php echo e($attendance['leave_category']); ?>"><?php echo e(__('L')); ?></span>
                                <?php endif; ?>
                                
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <?php endfor; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/attendance/get_report.blade.php ENDPATH**/ ?>