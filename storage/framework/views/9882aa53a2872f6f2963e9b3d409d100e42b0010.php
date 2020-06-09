<?php $__env->startSection('title', __('Add Bonus')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__('  BONUS')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__(' Dashboard')); ?> </a></li>
            <li><a href="<?php echo e(url('/hrm/bonuses')); ?>"><?php echo e(__(' Manage Bonuses')); ?></a></li>
            <li class="active"><?php echo e(__(' Add Bonus')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__(' Add Bonus')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('/hrm/bonuses/store')); ?>" method="post" name="bonus_add_form">
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
                                <p class="text-yellow"><?php echo e(__('Enter bonus details. All field are required. ')); ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="user_id"><?php echo e(__('Employee Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?> has-feedback">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user['id']); ?>"><?php echo e($user['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('user_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('user_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="bonus_name"><?php echo e(__('Bonus Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('bonus_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="bonus_name" id="bonus_name" class="form-control" value="<?php echo e(old('bonus_name')); ?>" placeholder="<?php echo e(__('Enter bonus name..')); ?>">
                                <?php if($errors->has('bonus_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('bonus_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="bonus_month"><?php echo e(__('Bonus Month')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('bonus_month') ? ' has-error' : ''); ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="bonus_month" class="form-control pull-right" value="<?php echo e(old('bonus_month')); ?>" id="monthpicker" placeholder="<?php echo e(__('yyy-mm-dd')); ?>">
                                </div>
                                <?php if($errors->has('bonus_month')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('bonus_month')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="bonus_amount"><?php echo e(__('Bonus Amount')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('bonus_amount') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="bonus_amount" id="bonus_amount" class="form-control" value="<?php echo e(old('bonus_amount')); ?>" placeholder="<?php echo e(__('Enter bonus name..')); ?>">
                                <?php if($errors->has('bonus_amount')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('bonus_amount')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="bonus_description"><?php echo e(__('Bonus Description')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('bonus_description') ? ' has-error' : ''); ?> has-feedback">
                                <textarea class="textarea text-description" name="bonus_description" id="bonus_description" placeholder="<?php echo e(__('Enter client description..')); ?>"><?php echo e(old('bonus_description')); ?></textarea>
                                <?php if($errors->has('bonus_description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('bonus_description')); ?></strong>
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
                    <a href="<?php echo e(url('/hrm/bonuses')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo e(__('Cancel')); ?> </a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Add Bouns')); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['bonus_add_form'].elements['user_id'].value = "<?php echo e(old('user_id')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/hrm/bonus/add_bonus.blade.php ENDPATH**/ ?>