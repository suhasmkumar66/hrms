<?php $__env->startSection('title', __('Generate Payslip')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     <?php echo e(__('GENERATE PAYSLIP')); ?> 
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
      <li><a><?php echo e(__('Salary')); ?></a></li>
      <li class="active"><?php echo e(__('Generate Payslip')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Manage Salary Payment')); ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
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
            <div class="col-md-12">
              <form class="form-horizontal" action="<?php echo e(url('/hrm/generate-payslips/')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <!-- /.end group -->
                <div class="form-group<?php echo e($errors->has('salary_month') ? ' has-error' : ''); ?>">
                  <label for="salary_month" class="col-sm-3 control-label"><?php echo e(__('Select Month')); ?></label>
                  <div class="col-sm-6">
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" name="salary_month" id="monthpicker2" class="form-control pull-right" value="<?php echo e($salary_month); ?>">
                      <?php if($errors->has('salary_month')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('salary_month')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <!-- /.end group -->
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo e(__('GO')); ?></button>
                  </div>
                </div>
                <!-- /.end group -->
              </form>
              <!-- /. end form -->
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"></div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>

      <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Employee Details')); ?></h3>
          </div>
          <div class="box-body">
            <!-- Notification Box -->
            <div class="col-md-12">
              <table class="table table-bordered">
               <tr class="bg-info">
                <th><?php echo e(__('sl#')); ?></th>
                <th><?php echo e(__('Employee Name')); ?></th>
                <th><?php echo e(__('Designation')); ?></th>
                <th><?php echo e(__('Salary Month')); ?></th>
                <th><?php echo e(__('Gross Salary')); ?></th>
                <th><?php echo e(__('Total Deduction')); ?></th>
                <th><?php echo e(__('Net Salary')); ?></th>
                <th><?php echo e(__('Provident Fund')); ?></th>
                <th><?php echo e(__('Payment Status')); ?></th>
              </tr>
              <?php ($sl = 1); ?>
              <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($sl++); ?></td>
                <td><?php echo e($employee['name']); ?></td>
                <td><?php echo e($employee['designation']); ?></td>
                <td><?php echo e(date("F Y", strtotime($salary_month))); ?></td>
                <?php ($debits = 0); ?>
                <?php ($credits = 0); ?>

                <?php ($credits += ($employee['basic_salary'] + $employee['house_rent_allowance'] + $employee['medical_allowance'] + $employee['special_allowance'] + $employee['other_allowance'])); ?>
                <?php ($debits += $employee['tax_deduction'] + $employee['provident_fund_deduction'] + $employee['other_deduction']); ?>

                <?php $__currentLoopData = $bonuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bonus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($employee['user_id'] == $bonus['user_id']): ?>
                <?php ($credits += $bonus['bonus_amount']); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($employee['user_id'] == $deduction['user_id']): ?>
                <?php ($debits += $deduction['deduction_amount']); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($employee['user_id'] == $loan['user_id']): ?>
                <?php ($installment = $loan['loan_amount'] / $loan['remaining_installments']); ?>
                <?php ($debits += $installment); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <td><?php echo e(number_format($credits, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($debits, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($credits - $debits, 2, '.', ',')); ?></td>
                <td><?php echo e(number_format($employee['provident_fund_contribution'] + $employee['provident_fund_deduction'], 2, '.', ',')); ?></td>

                <td>
                  <?php if(!empty($salary_payments)): ?>
                    <?php ($status = 0); ?>
                    <?php $__currentLoopData = $salary_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($salary_payment['user_id'] == $employee['user_id']): ?>
                        <?php ($status = 1); ?>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($status == 1): ?>
                      <p class="text-success"><?php echo e(__('Paid')); ?></p>
                    <?php else: ?>
                      <a href="<?php echo e(url('hrm/salary-payments/manage-salary/' . $employee['user_id'] . '/' . $salary_month)); ?>"><p class="text-danger"><?php echo e(__('Make payment')); ?></p></a>
                    <?php endif; ?>
                  <?php else: ?>
                    <a href="<?php echo e(url('hrm/salary-payments/manage-salary/' . $employee['user_id'] . '/' . $salary_month)); ?>"><p class="text-danger"><?php echo e(__('Make payment')); ?></p></a>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.end.col -->
  </div>
  <!-- /.end.row -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/salary_payment/employees_salary_list.blade.php ENDPATH**/ ?>