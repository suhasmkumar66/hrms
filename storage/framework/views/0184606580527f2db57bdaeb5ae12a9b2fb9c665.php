<?php $__env->startSection('title', __('Provident Funds')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    <?php echo e(__('PROVIDENT FUND')); ?>  
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
      <li><a><?php echo e(__('Provident Fund')); ?></a></li>
      <li class="active"><?php echo e(__('Provident Funds')); ?></li>
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
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')"><i class="fa fa-print"></i><span class="hidden-sm hidden-xs"><?php echo e(__('Print')); ?> </span></button>
              </div>
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
                <div id="printable_area" class="table-responsive">
                  <table class="table table-bordered">
                   <tr class="bg-info">
                    <th><?php echo e(__('sl')); ?></th>
                    <th><?php echo e(__('Employee Name')); ?></th>
                    <th><?php echo e(__('ID')); ?></th>
                    <th><?php echo e(__('Designation')); ?></th>
                    <th><?php echo e(__('Subscription Amount')); ?></th>
                    <th><?php echo e(__('Contribution Amount')); ?></th>
                    <th><?php echo e(__('Total Provident Funds')); ?></th>
              
                  </tr>
                  <?php ($sl = 1); ?>
                  <?php ($total = 0); ?>
                  <?php ($total_provident_fund  = 0); ?>
                  <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php $__currentLoopData = $provident_funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provident_fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($employee['id'] == $provident_fund->user_id): ?>
                    <?php ($total += $provident_fund->total_provident_fund); ?>
                    <?php ($total_provident_fund = $provident_fund->total_provident_fund); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($sl++); ?></td>
                    <td><?php echo e($employee['name']); ?></td>
                    <td><?php echo e($employee['employee_id']); ?></td>
                    <td><?php echo e($employee['designation']); ?></td>
                    <td><?php echo e($total_provident_fund/2); ?></td>
                    <td><?php echo e($total_provident_fund/2); ?></td>
                    <td><?php echo e($total_provident_fund); ?></td>


                    <!--<td><p class="text-warning">Unpaid</p></td>-->
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td colspan="7"> &nbsp; </td>
                  </tr>
                  <tr class="info">
                    <td colspan="5"> &nbsp; </td>
                    <td><strong><?php echo e(__('Total:')); ?></strong></td>
                    <td><?php echo e($total); ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"></div>
          <!-- /.box-footer -->
        </div>
      </div>
      <!-- /.box -->
    </div>

  </div>
  <!-- /.end.row -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/hrm/provident_fund/provident_funds.blade.php ENDPATH**/ ?>