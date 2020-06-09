<?php $__env->startSection('title', __('Set Attendance')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__('NEW ATTENDANCE')); ?>    
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
            <li><a><?php echo e(__('Attendance')); ?> </a></li>
            <li class="active"><?php echo e(__('New Attendance')); ?>  </li>
        </ol>
    </section>
 
               <?php
                $setimes= \App\SetTime::all();
                foreach($setimes as $time)
                {
                $id=$time->id;
                $intime=$time->in_time;
                $outtime=$time->out_time;
                }
                
                ?>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title btn-success"><?php echo e(__('New Attendance')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="<?php echo e(url('/hrm/attendance/set')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="datepicker3" value="<?php echo e($date); ?>">
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
            <form action="<?php echo e(url('/hrm/attendance/store')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('SL#')); ?></th>
                            <th><?php echo e(__('Employee Name')); ?></th>
                            <th><?php echo e(__('Designation')); ?></th>
                            <th  class="text-center"><?php echo e(__('Attendance')); ?></th>
                            <th><?php echo e(__('Leave Category')); ?></th>
                            <th><?php echo e(__('In Time /')); ?> <a href="#" data-toggle="modal" data-target="#modal-sm"><?php echo e(__('Set Time')); ?></a></th>
                            <th><?php echo e(__('Out Time /')); ?> <a href="#" data-toggle="modal" data-target="#modal-sm"><?php echo e(__('Set Time')); ?></a></th>
                        </tr>
                    </thead>

 



                    <tbody>
                        <?php ($sl = 1); ?>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sl++); ?></td>
                            <td>
                                <a href="<?php echo e(url('/hrm/attendance/details/' . $employee['id'])); ?>"><?php echo e($employee['name']); ?></a>
                                <input type="hidden" name="user_id[]" value="<?php echo e($employee['id']); ?>">
                                <input type="hidden" name="attendance_date[]" value="<?php echo e($date); ?>">
                            </td>
                            <td><?php echo e($employee['designation']); ?></td>
                            <td  class="text-center">
                                <div class="form-group">
                                  <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="attendance_status[]" value="1"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" checked>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="leave_category_id[]" class="form-control">
                                    <option selected value="0"><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $leave_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($leave_category['id']); ?>"><?php echo e($leave_category['leave_category']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="check_in[]" class="form-control" value="<?php echo e($intime); ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="check_out[]" class="form-control" value="<?php echo e($outtime); ?>">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7"><button type="submit" class="btn btn-primary btn-flat pull-right"><i class="icon fa fa-save"></i> <?php echo e(__('Save')); ?></button></td>
                    </tr>
                </tfoot>
            </table>
        </form>


<!-- ===============================/.modal============================== -->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header settime">
              <h4 class="modal-title"><?php echo e(__('Set of both New Time')); ?>  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

              
     <?php if($setimes->count()>0): ?>


        <form action="<?php echo e(url('/hrm/attendance/time/set')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">

                <input type="hidden" name="id" value="<?php echo e($id); ?>">
               
                
                <label><?php echo e(__('In Time')); ?> <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="in_time" class="form-control" value="<?php echo e($intime); ?>">
                </div>
                <label><?php echo e(__('Out Time')); ?><span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="out_time" class="form-control" value="<?php echo e($outtime); ?>">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button>
            </div>
        </form>

          <?php else: ?>

        <form action="<?php echo e(url('/hrm/attendance/time/set')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               
                
                <label><?php echo e(__('In Time')); ?> <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="in_time" class="form-control" value="09:12:00">
                </div>
                <label><?php echo e(__('Out Time')); ?><span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="out_time" class="form-control" value="17:12:00">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button>
            </div>
        </form>
        <?php endif; ?>





          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- ================================/.modal =============================-->

















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
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/hrm/attendance/set_attendance.blade.php ENDPATH**/ ?>