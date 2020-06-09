<?php $__env->startSection('title', __('Role Create')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__(' ROLE')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/role-types')); ?>"><?php echo e(__('Role')); ?></a></li>
            <li class="active"><?php echo e(__('Add role')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add Role')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle=tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(route('setting.role.store')); ?>" method="post" role="form">
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
                            <p class="text-yellow"><?php echo e(__('Enter role type details. All field are required. ')); ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="name"><?php echo e(__('Name of Role')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Enter role name..')); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="display_name"><?php echo e(__('Display Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('display_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="display_name" id="display_name" class="form-control" value="<?php echo e(old('display_name')); ?>" placeholder="<?php echo e(__('Enter display name..')); ?>">
                                <?php if($errors->has('display_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('display_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="description"><?php echo e(__('Description')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="description" id="description" class="form-control" value="<?php echo e(old('description')); ?>" placeholder="<?php echo e(__('Enter display name..')); ?>">
                                <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-12">
                            <label for="description"><?php echo e(__('Permissions')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?> has-feedback">
                               <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <input type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>" > <?php echo e($permission->name); ?> <br>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                           <!-- /.form-group -->
                       </div>
                       <!-- /.col -->
                   </div>
                   <!-- /.row -->
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                <a href="<?php echo e(route('setting.role.index')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Create Role')); ?></button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/setting/role/create.blade.php ENDPATH**/ ?>