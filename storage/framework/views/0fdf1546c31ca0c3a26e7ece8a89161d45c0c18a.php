<?php $__env->startSection('title', __('Companies')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e(__('COMPANY')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('Setting')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/companies')); ?>"><?php echo e(__('Companies')); ?></a></li>
            <li class="active"><?php echo e(__('Add Company')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add Company')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('setting/companies/store')); ?>" method="post" name="company_add_form"  enctype="multipart/form-data">
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
                                <p class="text-yellow"><?php echo e(__('Enter company details. All field are required.')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="company_name"><?php echo e(__('Company Name')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('company_name') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo e(old('company_name')); ?>" placeholder="<?php echo e(__('Enter company name..')); ?>">
                                <?php if($errors->has('company_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <label for="company_code"><?php echo e(__('Company Code')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('company_code') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="company_code" id="company_code" class="form-control" value="<?php echo e(old('company_code')); ?>" placeholder="<?php echo e(__('Enter company code..')); ?>">
                                <?php if($errors->has('company_code')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_code')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <label for="company_website"><?php echo e(__('Company Website')); ?></label>
                            <div class="form-group<?php echo e($errors->has('company_website') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="company_website" id="company_website" class="form-control" value="<?php echo e(old('company_website')); ?>" placeholder="<?php echo e(__('Enter company website..')); ?>">
                                <?php if($errors->has('company_website')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_website')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <label for="avatar"><?php echo e(__('Company Logo')); ?></label>
                            <div class="form-group<?php echo e($errors->has('company_logo') ? ' has-error' : ''); ?> has-feedback">
                                <input type="file" name="company_logo" id="company_logo" class="form-control">
                                <?php if($errors->has('company_logo')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_logo')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                              
                        </div>
                        <div class="col-md-6">
                        <label for="company_contact_number"><?php echo e(__('Company Contact No')); ?></label>
                            <div class="form-group<?php echo e($errors->has('company_contact_number') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="company_contact_number" id="company_contact_number" class="form-control" value="<?php echo e(old('company_contact_number')); ?>" placeholder="<?php echo e(__('Enter company contact no..')); ?>">
                                <?php if($errors->has('company_contact_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_contact_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                             <label for="company_email"><?php echo e(__('Company Email')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('"company_email"') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="company_email" id="company_email" class="form-control" value="<?php echo e(old('company_email')); ?>" placeholder="<?php echo e(__('Enter company email...')); ?>">
                                <?php if($errors->has('company_email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="publication_status"><?php echo e(__('Publication Status')); ?><span class="text-danger">*</span></label>
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
                            <label for="company_description"><?php echo e(__('Company Description')); ?></label>
                            <div class="form-group<?php echo e($errors->has('company_description') ? ' has-error' : ''); ?> has-feedback">
                                <textarea class="textarea text-description" name="company_description" id="company_description" placeholder="<?php echo e(__('Enter Company description..')); ?>"><?php echo e(old('company_description')); ?></textarea>
                                <?php if($errors->has('company_description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_description')); ?></strong>
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
                    
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Create')); ?></button>

                    <a href="<?php echo e(url('/setting/companies')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo e(__('Cancel')); ?></a>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['company_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/setting/company/add_company.blade.php ENDPATH**/ ?>