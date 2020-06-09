<?php $__env->startSection('title', __('Personal Events')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('PERSONAL EVENT')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li class="active"><?php echo e(__('Personal Events')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Manage Personal Events')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                
                <div  class="col-md-6">
                    <a href="<?php echo e(url('/setting/personal-events/create')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i><?php echo e(__('Add personal event')); ?> </a>
                </div>
                <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="<?php echo e(__('Search..')); ?>">
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
                    <div class="col-md-12 table-responsive">
                    <table  class="table table-bordered table-striped">
                        <tbody id="myTable">
                            <tr>
                                <th><?php echo e(__('SL#')); ?></th>
                                <th><?php echo e(__('Personal Event')); ?></th>
                                <th><?php echo e(__('Start Date')); ?></th>
                                <th><?php echo e(__('End Date')); ?></th>
                                <th><?php echo e(__('Personal Event Description')); ?></th>
                                <th class="text-center"><?php echo e(__('Added By')); ?></th>
                                <th class="text-center"><?php echo e(__('Added')); ?></th>
                                <th class="text-center"><?php echo e(__('Status')); ?></th>
                                <th class="text-center"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ($sl = 1); ?>
                            <?php $__currentLoopData = $personal_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personal_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sl++); ?></td>
                                <td><?php echo e($personal_event['personal_event']); ?></td>
                                <td class="text-center"><?php echo e(date("d F Y", strtotime($personal_event['start_date']))); ?></td>
                                <td class="text-center"><?php echo e(date("d F Y", strtotime($personal_event['end_date']))); ?></td>
                                <td><?php echo e(str_limit($personal_event['personal_event_description'], 65)); ?></td>
                                <td class="text-center"><?php echo e($personal_event['name']); ?></td>
                                <td class="text-center"><?php echo e(date("d F Y", strtotime($personal_event['created_at']))); ?></td>
                                <td class="text-center">
                                    <?php if($personal_event['publication_status'] == 1): ?>
                                     <span class="label label-success"><?php echo e(__('Published')); ?></span>
                                <?php else: ?>
                                <span class="label label-warning"><?php echo e(__('Unpublished')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                  <a href="<?php echo e(url('/setting/personal-events/edit/' . $personal_event['id'])); ?>"><i class="icon fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
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

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/setting/personal_event/manage_personal_events.blade.php ENDPATH**/ ?>