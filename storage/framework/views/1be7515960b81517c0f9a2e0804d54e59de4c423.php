<?php $__env->startSection('title', __('Departments')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('DEPARTMENT')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/departments')); ?>"><?php echo e(__('Departments')); ?></a></li>
            <li class="active"><?php echo e(__('Details')); ?></li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Details of department')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo e(url('/setting/departments')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i><?php echo e(__('Back')); ?> </a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td><?php echo e(__('Department')); ?></td>
                            <td><?php echo e($department->department); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Department Description')); ?></td>
                            <td><?php echo e($department->department_description); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Create By')); ?></td>
                            <td><?php echo e($department->name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Date Added')); ?></td>
                            <td><?php echo e(date("D d F Y h:ia", strtotime($department->created_at))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Last Updated')); ?></td>
                            <td><?php echo e(date("D d F Y h:ia", strtotime($department->updated_at))); ?></td>
                        </tr>
                        <tr>
                           
                                    <?php if($department->publication_status == 1): ?>
                                        <div class="btn-group">
                                            <a href="<?php echo e(url('/setting/departments/unpublished/' . $department->id)); ?>" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> <?php echo e(__('Published')); ?></span>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="btn-group">
                                            <a href="<?php echo e(url('/setting/departments/published/' . $department->id)); ?>" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-sm hidden-xs"> <?php echo e(__('Unpublished')); ?></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                   
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/setting/department/show_department.blade.php ENDPATH**/ ?>