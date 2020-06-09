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
            <li class="active"><?php echo e(__('Details')); ?></li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Details of company')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo e(url('/setting/companies')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i><?php echo e(__('Back')); ?> </a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td><?php echo e(__('Company Name')); ?></td>
                            <td><?php echo e($company->company_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Code')); ?></td>
                            <td><?php echo e($company->company_code); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Logo')); ?></td>
                            <td> <?php if(!empty($company->company_logo)): ?>
                                <img src="data:image/png;base64,<?php echo e(chunk_split(base64_encode($company->company_logo))); ?>" class="img-responsive img-thumbnail">
                                <?php else: ?>
                            	<img src="<?php echo e(url('profile_picture/blank_profile_picture.png')); ?>" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            	<?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Description')); ?></td>
                            <td><?php echo e($company->company_description); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Website')); ?></td>
                            <td><?php echo e($company->company_website); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Contact No')); ?></td>
                            <td><?php echo e($company->company_contact_number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Company Email')); ?></td>
                            <td><?php echo e($company->company_email); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Created By')); ?></td>
                            <td><?php echo e($company->name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Date Added')); ?></td>
                            <td><?php echo e(date("D d F Y h:ia", strtotime($company->created_at))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Last Updated')); ?></td>
                            <td><?php echo e(date("D d F Y h:ia", strtotime($company->updated_at))); ?></td>
                        </tr>
                        <tr>
                           
                                    <?php if($company->publication_status == 1): ?>
                                        <div class="btn-group">
                                            <a href="<?php echo e(url('/setting/companies/unpublished/' . $company->id)); ?>" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> <?php echo e(__('Published')); ?></span>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="btn-group">
                                            <a href="<?php echo e(url('/setting/companies/published/' . $company->id)); ?>" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
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
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/setting/company/show_company.blade.php ENDPATH**/ ?>