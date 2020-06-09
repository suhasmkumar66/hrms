<?php $__env->startSection('title', __('Team member details')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__(' TEAM')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a><?php echo e(__('People')); ?></a></li>
            <li><a href="<?php echo e(url('/people/employees')); ?>"><?php echo e(__('Team')); ?></a></li>
            <li class="active"><?php echo e(__('Details')); ?></li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Team member details')); ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="<?php echo e(url('/people/employees')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> <?php echo e(__('Back')); ?></a>
            <hr>
            <div id="printable_area">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p>
                                <?php echo e($employee->name); ?>

                                <br>
                                <?php echo e($employee->employee_id); ?>

                                <br>
                                <?php echo e($employee->designation); ?>

                            </p>
                        </td>
                        <td>
                            <?php if(!empty($employee->avatar)): ?>
                            <img src="<?php echo e(url('profile_picture/' . $employee->avatar)); ?>" class="img-responsive img-thumbnail">
                            <?php else: ?>
                            <img src="<?php echo e(url('profile_picture/blank_profile_picture.png')); ?>" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><?php echo e(__('Father\'s Name')); ?></td>
                            <td><?php echo e($employee->father_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Mother\'s Name')); ?></td>
                            <td><?php echo e($employee->mother_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Spouse Name')); ?></td>
                            <td><?php echo e($employee->spouse_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Present Address')); ?></td>
                            <td><?php echo e($employee->present_address); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Permanent Address')); ?></td>
                            <td><?php echo e($employee->permanent_address); ?></td>
                        </tr>
                        <tr>
                           <td><?php echo e(__('Designation')); ?></td>
                            <td>
                               <?php echo e($employee->designation); ?>

                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Email')); ?></td>
                            <td><?php echo e($employee->email); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Web')); ?></td>
                            <td><?php echo e($employee->web); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Contact No')); ?></td>
                            <td><?php echo e($employee->contact_no_one); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Emergency Contact')); ?></td>
                            <td><?php echo e($employee->emergency_contact); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('ID Name')); ?></td>
                            <td>
                                <?php if($employee->id_name == 1): ?>
                                <p><?php echo e(__('NID')); ?></p>
                                <?php elseif($employee->id_name == 2): ?>
                                <p><?php echo e(__('Passport')); ?></p>
                                <?php elseif($employee->id_name == 3): ?>
                                <p><?php echo e(__('Driving License')); ?></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('ID Number')); ?></td>
                            <td><?php echo e($employee->id_number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Gender')); ?></td>
                            <td>
                                <?php if($employee->gender == 'm'): ?>
                                <p><?php echo e(__('Male')); ?></p>
                                <?php else: ?>
                                <p><?php echo e(__('Female')); ?></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Marital Status')); ?></td>
                            <td>
                                <?php if($employee->marital_status == 1): ?>
                                <p><?php echo e(__('Married')); ?></p>
                                <?php elseif($employee->marital_status == 2): ?>
                                <p><?php echo e(__('Single')); ?></p>
                                <?php elseif($employee->marital_status == 3): ?>
                                <p><?php echo e(__('Divorced')); ?></p>
                                <?php elseif($employee->marital_status == 4): ?>
                                <p><?php echo e(__('Separated')); ?></p>
                                <?php elseif($employee->marital_status == 5): ?>
                                <p><?php echo e(__('Widowed')); ?></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Date of Birth')); ?></td>
                            <td>
                                <?php if($employee->date_of_birth != NULL): ?>
                                <?php echo e(date("d F Y", strtotime($employee->date_of_birth))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Academic Qualification')); ?></td>
                            <td><?php echo e($employee->academic_qualification); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Profession Qualification')); ?></td>
                            <td><?php echo e($employee->professional_qualification); ?></td>
                        </tr>
                        <tr>
                             <td><?php echo e(__('Department')); ?></td>
                            <td>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($employee->joining_position == $department->id): ?>
                                <?php echo e($department->department); ?>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td><?php echo e(__('Joining Date')); ?></td>
                            <td><?php echo e(date("D d F Y - h:ia", strtotime($employee->joining_date))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Experience')); ?></td>
                            <td><?php echo e($employee->experience); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Reference')); ?></td>
                            <td><?php echo e($employee->reference); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Created By')); ?></td>
                            <td><?php echo e($created_by->name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Date Added')); ?></td>
                            <td><?php echo e(date("D d F Y - h:ia", strtotime($employee->created_at))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Last Updated')); ?></td>
                            <td><?php echo e(date("D d F Y - h:ia", strtotime($employee->updated_at))); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Start Button -->
            <div class="btn-group btn-group-justified">
                <?php if($employee->activation_status == 1): ?>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/employees/deactive/' . $employee->id)); ?>" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Click to deactive">
                        <i class="fa fa-arrow-down"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Active')); ?></span>
                    </a>
                </div>
                <?php else: ?>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/employees/active/' . $employee->id)); ?>" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Click to active">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Deactive')); ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="btn-group">
                    <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                        <i class="fa fa-print"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Print')); ?></span>
                    </button>
                </div>
               
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/employees/edit/' . $employee->id)); ?>" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Edit')); ?></span>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/employees/delete/' . $employee->id)); ?>" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Click to delete" onclick="return confirm('Are you sure to delete this ?');">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Delete')); ?></span>
                    </a>
                </div>
            </div>
            <!-- /.End Button -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\HRMS Projects\Laravel-HRMS\resources\views/administrator/people/employee/show_employee.blade.php ENDPATH**/ ?>