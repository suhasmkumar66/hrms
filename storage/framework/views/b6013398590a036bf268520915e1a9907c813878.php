<?php $__env->startSection('title', __('Manage Increment')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__(' Manage Increment')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Increment')); ?></a></li>
            <li class="active"><?php echo e(__('Manage Increment')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Manage Increment')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div  class="col-md-1">
                <a href="<?php echo e(url('/hrm/payroll/increment/search')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(__('Add New Increment')); ?></a>
            </div>
			<div  class="col-md-10">
                    <input type="text" id="myInput" class="form-control search-float" placeholder="<?php echo e(__('Search..')); ?>">
                </div>
                <div  class="col-md-1">
                <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                    <i class="fa fa-print"></i>
                    <span class="hidden-sm hidden-xs"> <?php echo e(__('Print')); ?></span>
                </button>
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
                <div id="printable_area" class="col-md-12 table-responsive">



                <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('SL')); ?></th>
                            <th><?php echo e(__('ID NO')); ?></th>
                            <th><?php echo e(__('Created By')); ?></th>
                            <th><?php echo e(__('Employee')); ?></th>
                            <th><?php echo e(__('Increment Date')); ?></th>
                            <th><?php echo e(__('Increment Amount')); ?> </th>
                            <th><?php echo e(__('Increment Purpose')); ?></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php ($sl = 1); ?>
                        <?php $__currentLoopData = $increments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $increment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sl ++); ?></td>
                            <td>INCR<?php echo e($increment->id); ?></td>
                            <td><?php echo e(Auth::user()->name); ?></td>
                            <?php $empname= \App\User::find($increment->emp_id)->name;?>
                            <td><?php echo e($empname); ?></td>
                            <td><?php echo e(date("d F Y", strtotime($increment->date))); ?></td>
                            <td><?php echo e($increment->amount); ?></td>
                            <td><?php echo e($increment->incr_purpose); ?></td>
                           

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

  


            </div><!--printable-->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/hrm/increment/incrementList.blade.php ENDPATH**/ ?>