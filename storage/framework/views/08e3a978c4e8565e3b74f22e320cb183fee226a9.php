<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

<?php $__env->startSection('title', __('Manage Salary Payment')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     <?php echo e(__('SALARY PAYMENT')); ?> 
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
      <li><a><?php echo e(__('Salary')); ?></a></li>
      <li class="active"><?php echo e(__('Manage Salary Payment')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(__('Manage Salary Payment')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
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
          <?php endif; ?>
        </div>
        <!-- /.Notification Box -->
        <div class="col-md-12">


          <form class="form-horizontal" action="<?php echo e(url('/hrm/salary-payments/go')); ?>" method="post">
            <?php echo e(csrf_field()); ?>


             <div class="form-group<?php echo e($errors->has('department_id') ? ' has-error' : ''); ?>">
              <label for="user_id" class="col-sm-3 control-label"><?php echo e(__('Department')); ?></label>
              <div class="col-sm-6">
                <select name="department_id" id="department_id" class="form-control" onchange="getUsers()">
                  <option selected disabled><?php echo e(__('Select One')); ?></option>
                  <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($dpt['id']); ?>" ><strong><?php echo e($dpt['department']); ?></strong></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('department_id')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('department_id')); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>

            <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
              <label for="user_id" class="col-sm-3 control-label"><?php echo e(__('Employee Name')); ?></label>
              <div class="col-sm-6">
                <select name="user_id" id="user_id" class="form-control">
                  <option selected disabled><?php echo e(__('Select One')); ?></option>
                  <!-- <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($employee['id']); ?>"><strong><?php echo e($employee['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                  </select>
                  <?php if($errors->has('user_id')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('user_id')); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group<?php echo e($errors->has('salary_month') ? ' has-error' : ''); ?>">
                <label for="salary_month" class="col-sm-3 control-label"><?php echo e(__('Select Month')); ?></label>
                <div class="col-sm-6">
                  <div class="input-group date">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" name="salary_month" id="monthpicker" class="form-control pull-right" value="<?php echo e(old('salary_month')); ?>" id="datepicker">
                    <?php if($errors->has('salary_month')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('salary_month')); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo e(__('GO')); ?></button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
               <?php if(Session::get('salary')): ?>
               <div id="printable_area" class="col-md-12 table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
               <th>Sl No</th>
                <th>Name</th>
                <th>CTC</th>
                <th>Gross</th>
               <!--  <th>Working Days</th> -->
                <th>Present Days</th>
                <th>LOP</th>
                <th>Emp Deduction</th>
                <th>LOP Deduction</th>
                <th>Total Deductions</th>
                <th>Net Salary</th>
                <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  
                 <?php $sl = 1; ?>

                 <?php $salary = Session::get('salary'); ?>
                 <?php $salary_month = Session::get('salary_month'); ?>
                    <?php $__currentLoopData = $salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($sal['name']); ?></td>
                  <td><?php echo e($sal['gross_salary']); ?></td>
                  <td><?php echo e($sal['ctc']); ?></td>
                  <!-- <td><?php echo e(Helper::getAttendanceDays($sal['user_id'],$salary_month)); ?> Days</td> -->
                  <td><?php echo e(Helper::getPresentDays($sal['user_id'],$salary_month)); ?> Days</td>
                  <td><?php echo e(Helper::getAbsentDays($sal['user_id'],$salary_month)); ?> Days</td>
                  <td><?php echo e($sal['total_deduction']); ?></td>
                  <td><?php echo e(Helper::getLOPDeduction($sal['user_id'],$salary_month,$sal['gross_salary'])); ?></td>
                  <td><?php echo e(Helper::getTotalDeduction($sal['user_id'],$salary_month,$sal['gross_salary'],$sal['total_deduction'])); ?></td>
                   <td><?php echo e(Helper::getNetSalary($sal['user_id'],$salary_month,$sal['gross_salary'],$sal['total_deduction'],$sal['net_salary'])); ?></td>
                  <td class="text-center">
                               <a href="<?php echo e(url('/hrm/salary-payments/manage-salary/' . $sal['id']).'/'.'2020-04'); ?>"><i class="icon fa fa-edit"></i> <?php echo e(__('Make Payment')); ?></a>
                            </td>
                </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
              </tbody>
              </table>
            </div>
            <form class="form-horizontal" action="<?php echo e(url('/bulksalarypayment')); ?>" method="post">
               <?php echo e(csrf_field()); ?>

               <input type="hidden" name="dpt_id" id="dpt_id" value="">
               <input type="hidden" name="month" id="month" value="">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo e(__('Bulk Payment')); ?></button>
                </div>
            <?php endif; ?>
            <!-- /. end form -->
          </div>
        </form>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix"></div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <?php $__env->stopSection(); ?>

  <script>
    $(document).ready(function() { 

     let searchParams = new URLSearchParams(window.location.search);
     var dpt=  searchParams.has('dpt_id');
     var month = searchParams.has('month') // true
   if(dpt == true){
     let param = searchParams.get('dpt_id');
     // let monparam = searchParams.get('D');
       $("#dpt_id").val(param[0]);
       $("#month").val('2020-02');
   }
    });
  </script>

  <script type="text/javascript">

   
    
    function getUsers(){
      var department = $("#department_id").val();  
       $.ajax({
        url: "<?php echo e(url('/getDepartmentUser')); ?>",
        type: 'POST',
        data: {_token: '<?php echo csrf_token(); ?>',department_id: department },
        success: function(data){
          $.each(data, function(key, value) {   
          $('#user_id')
         .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name)); 
});

        }
    });
    }
  </script>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/salary_payment/manage_payment.blade.php ENDPATH**/ ?>