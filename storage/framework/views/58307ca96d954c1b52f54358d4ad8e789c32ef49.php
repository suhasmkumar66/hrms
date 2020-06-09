<?php $__env->startSection('title', __('Designations')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('DESIGNATIONS')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/designations')); ?>"><?php echo e(__('Designations')); ?></a></li>
            <li class="active"><?php echo e(__('Add designation')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add designation')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('setting/designations/store')); ?>" method="post" name="designation_add_form">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="row">
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
                            <?php else: ?>
                                <p class="text-yellow"><?php echo e(__('Enter designation details. All field are required.')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="designation"><?php echo e(__('Designation')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('designation') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="designation" id="designation" class="form-control" value="<?php echo e(old('designation')); ?>" placeholder="<?php echo e(__('Enter client name..')); ?>">
                                <?php if($errors->has('designation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('designation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="department_id"><?php echo e(__('Department')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('department_id') ? ' has-error' : ''); ?> has-feedback">
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department['id']); ?>"><?php echo e($department['department']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('department_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('department_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="publication_status"><?php echo e(__('Publication Status')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('publication_status') ? ' has-error' : ''); ?> has-feedback">
                                <select name="publication_status" id="publication_status" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <option value="1"><?php echo e(__('Published')); ?></option>
                                    <option value="0"><?php echo e(__('Unpublished')); ?></option>
                                </select>
                                <?php if($errors->has('publication_status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('publication_status')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="designation_description"><?php echo e(__('Designation Description')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('designation_description') ? ' has-error' : ''); ?> has-feedback">
                                <textarea class="textarea text-description" name="designation_description" id="designation_description" placeholder="<?php echo e(__('Enter client description..')); ?>"><?php echo e(old('designation_description')); ?></textarea>
                                <?php if($errors->has('designation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('designation_description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?php echo e(url('/setting/designations')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Add designation')); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['designation_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
    document.forms['designation_add_form'].elements['department_id'].value = "<?php echo e(old('department_id')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/setting/designation/add_designation.blade.php ENDPATH**/ ?>