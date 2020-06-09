
<link rel="stylesheet" href="<?php echo e(asset('backend/mystyle.css')); ?>">
<div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
          
            <div class="box-body">
                <div class="btn-body">
                <a href="<?php echo e(url('hrm/salary/statement/search')); ?>" class="mybtn"><?php echo e(__('Back')); ?></a>
              
                <button onclick="window.print()" class="mybtn"><?php echo e(__('Print')); ?></button>
               
                </div>
      

                

                 <div class="st-left-body">
                    <h4>
                    <?php $users= \App\User::all()->where('employee_id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    $idno=$user->id_number;
                    $joindate=$user->joining_date;
                    $contact=$user->contact_no_one;
                    $datebirth=$user->date_of_birth;
                    $designation=$user->designation_id;
                    $prsaddress=$user->present_address;
                    $prmaddress=$user->permanent_address;
                    }
                    
                    ?>
                    <?php echo e(__('EMP ID NO:')); ?> <?php echo e($idno); ?><br>
                    <?php echo e(__('Name:')); ?> <?php echo e($empname); ?><br>
                    <?php $desig= \App\Designation::find($designation)->designation;?>
                    <?php echo e(__('Designation:')); ?> <?php echo e($desig); ?><br>
                    <?php echo e(__('Date of Birth:')); ?> <?php echo e($datebirth); ?><br>
                    <?php echo e(__('Joining Date:')); ?> <?php echo e($joindate); ?><br>
                    <?php echo e(__('Contact:')); ?> <?php echo e($contact); ?><br>
                    </h4>
                </div>
                <div class="st-center-body">
                    <div class="img-body"><img src="<?php echo e(asset('profile_picture/'.auth()->user()->avatar)); ?>" class="img"></div>
                    <h2><?php echo e(__('Salary Statement')); ?></h2>
                    <center><b><?php echo e(date("F Y", strtotime($startdate))); ?> to <?php echo e(date("F Y", strtotime($enddate))); ?><br>
                    <?php $users= \App\User::all()->where('employee_id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    }
                    
                    ?>
                    
                    </b></center>
                </div>
                <div class="st-right-body">
                    <h4>
                    <?php echo e(__('Present Address:')); ?> <?php echo e($prsaddress); ?><br>
                    <?php echo e(__('Permanent Address:')); ?> <?php echo e($prmaddress); ?>

                    
                    </h4>
                </div>



                
                <div id="printable_area" class="table-responsive">
              


                <table class="mytable">
                    <thead>
                        <tr>
                            <th><?php echo e(__('SL')); ?></th>
                            <th><?php echo e(__('PAID ID NO')); ?></th>
                            <th><?php echo e(__('Pay Month')); ?></th>
                            <th><?php echo e(__('Pay By')); ?></th>
                            <th><?php echo e(__('Note')); ?></th>
                            <th><?php echo e(__('Received Salary')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ($sl = 1); ?>
                        <?php $__currentLoopData = $salarystats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sl ++); ?></td>
                            <td><?php echo e(__('PRLL')); ?><?php echo e($payroll->id); ?></td>
                            <td><?php echo e(date("d F Y", strtotime($payroll->payment_month))); ?></td>
                            <td><?php echo e(Auth::user()->name); ?></td>
                            <td><?php echo e($payroll->note); ?></td>
                            <td><?php echo e($payroll->gross_salary); ?></td>
                           

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e(__('Total')); ?></th>
                            <th><?php echo e($datetotal); ?></th>
                        </tr>

                    </tbody>
                </table>
            </div><!--printable-->



            <div class="sign-body-l">-----------------------------------<br><?php echo e(__('Employee')); ?></div>
            <div class="sign-body-r">-----------------------------------<br><?php echo e(__('Authorized')); ?></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/hrm/increment/salaryStatementPreview.blade.php ENDPATH**/ ?>