<?php $__env->startSection('content'); ?>
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<img alt="Dalvkot HRMS" src="<?php echo e(asset('profile_picture/1569380903.png')); ?>" class="img-responsive">
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-12 control-label"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Send Password Reset Link')); ?>

                                </button>
                                 <a  href="<?php echo e(route('login')); ?>" class="float-right">
                                   <?php echo e(__('Login')); ?> 
                                </a>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\hrm-projects\Laravel-HRMS\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>