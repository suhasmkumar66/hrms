<?php $__env->startSection('title', __('Add Holiday Lists')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e(__('Holiday Lists')); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
      <li><a><?php echo e(__('Setting')); ?></a></li>
      <li><a href="<?php echo e(url('/setting/holidays')); ?>"><?php echo e(__('Holiday Lists')); ?></a></li>
      <li class="active"><?php echo e(__('Add Holiday Lists')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(__('Add Holiday Lists')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <form action="<?php echo e(url('setting/holidays/store')); ?>" method="post" name="holidays_add_form">
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
              <p class="text-yellow"><?php echo e(__('Enter holidays details. All field are required.')); ?> </p>
              <?php endif; ?>
            </div>
            <!-- /.Notification Box -->

            <div class="col-md-6">
              <label for="holiday_name"><?php echo e(__('Holiday Name')); ?> <span class="text-danger">*</span></label>
              <div class="form-group<?php echo e($errors->has('holiday_name') ? ' has-error' : ''); ?> has-feedback">
                <input type="text" name="holiday_name" id="holiday_name" class="form-control" value="<?php echo e(old('holiday_name')); ?>" placeholder="<?php echo e(__('Enter Holiday name..')); ?>">
                <?php if($errors->has('holiday_name')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('holiday_name')); ?></strong>
                </span>
                <?php endif; ?>
              </div>
              <!-- /.form-group -->

              <div class="form-group<?php echo e($errors->has('date') ? ' has-error' : ''); ?>">
                <label><?php echo e(__('Date:')); ?></label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker">
                  <?php if($errors->has('date')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('date')); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
                <!-- /.input group -->
              </div>


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
              <label for="description"><?php echo e(__('Holiday Description ')); ?></label>
              <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?> has-feedback">
                <textarea class="textarea text-description" name="description" id="description" placeholder="<?php echo e(__('Enter Holiday description..')); ?>"><?php echo e(old('description')); ?></textarea>
                <?php if($errors->has('description')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('description')); ?></strong>
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
          <a href="<?php echo e(url('setting/holidays')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Create')); ?></button>
        </div>
      </form>
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
  document.forms['holidays_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/setting/holiday/add-holidays.blade.php ENDPATH**/ ?>