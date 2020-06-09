<?php $__env->startSection('title', __('personal events')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__('PERSONAL EVENT')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/personal_events')); ?>"><?php echo e(__('Personal Events')); ?></a></li>
            <li class="active"><?php echo e(__('Add Personal Event')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add Personal Event')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('setting/personal-events/store')); ?>" method="post" name="personal_event_add_form">
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
                                <p class="text-yellow"><?php echo e(__('Enter personal_event details. All field are required.')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="personal_event"><?php echo e(__('Personal Event')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('personal_event') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="personal_event" id="personal_event" class="form-control" value="<?php echo e(old('personal_event')); ?>" placeholder="<?php echo e(__('Enter client name..')); ?>">
                                <?php if($errors->has('personal_event')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('personal_event')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="start_date"><?php echo e(__('Start Date')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="start_date" id="datepicker" class="form-control" value="<?php echo e(old('start_date')); ?>">
                                <?php if($errors->has('start_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('start_date')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="end_date"><?php echo e(__('End Date')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="end_date" id="datepicker2" class="form-control" value="<?php echo e(old('end_date')); ?>">
                                <?php if($errors->has('end_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('end_date')); ?></strong>
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
                            <label for="personal_event_description"><?php echo e(__('Personal Event Description')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('personal_event_description') ? ' has-error' : ''); ?> has-feedback">
                                <textarea class="textarea text-description" name="personal_event_description" id="personal_event_description" placeholder="<?php echo e(__('Enter client description..')); ?>"><?php echo e(old('personal_event_description')); ?></textarea>
                                <?php if($errors->has('personal_event')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('personal_event_description')); ?></strong>
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
                    <a href="<?php echo e(url('/setting/personal-events')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Add Personal Event')); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['personal_event_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\hrm-projects\Laravel-HRMS\resources\views/administrator/setting/personal_event/add_personal_event.blade.php ENDPATH**/ ?>