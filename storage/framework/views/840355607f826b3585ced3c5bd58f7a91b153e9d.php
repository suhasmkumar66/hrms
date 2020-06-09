
<div class="invoice">
    <div class="heeading">
        <div class="invo"><b><?php echo e(__('Salary Statement')); ?></b></div></div>
<div class="row">
  <div class="column">
   
  <img src="<?php echo e(asset('profile_picture/'.auth()->user()->avatar)); ?>" class="img"><br><br><br>
   

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
                    <b> 
                    <?php echo e(__('EMP ID NO: ')); ?><?php echo e($idno); ?><br>
                    <?php echo e(__('Name:')); ?> <?php echo e($empname); ?><br>
                    <?php $desig= \App\Designation::find($designation)->designation;?>
                    <?php echo e(__('Designation:')); ?> <?php echo e($desig); ?><br>
                    </b>
                     
                  
  </div>
 
  <div class="column">
  </div>
  <div class="column">
                                <br>
<p>
    <?php echo e(__('Date of Birth: ')); ?> <?php echo e($datebirth); ?><br>
    <?php echo e(__('Joining Date:')); ?> <?php echo e($joindate); ?><br>
    <?php echo e(__('Contact: ')); ?><?php echo e($contact); ?><br>
    <?php echo e(__('Present Address:')); ?> <?php echo e($prsaddress); ?><br>
    <?php echo e(__('Permanent Address:')); ?> <?php echo e($prmaddress); ?></p>
  </div>

</div>

 
<div class="row table-responsive">
    <table border="1" class="mytable">

        <tr class="firstrow">
            <td><?php echo e(__('SL')); ?></td>
            <td><?php echo e(__('PAID ID NO')); ?></td>
            <td><?php echo e(__('Pay Month')); ?></td>
            <td><?php echo e(__('Pay By')); ?></td>
            <td><?php echo e(__('Note')); ?></td>
            <td><?php echo e(__('Received Salary')); ?></td></tr>

         
            <?php ($sl = 1); ?>
            <?php $__currentLoopData = $salarystats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($sl ++); ?></td>
                <td><?php echo e(__('PRLL')); ?><?php echo e($payroll->id); ?></td>
                <td><?php echo e(date("d F Y", strtotime($payroll->payment_month))); ?></td>
                <td><?php echo e(Auth::user()->name); ?></td>
                <td><?php echo e($payroll->note); ?></td>
                <td>$<?php echo e($payroll->gross_salary); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </table>
  
  <div class="column1">
  </div>
  <div class="column1">
  </div>
  <div class="column1">
                         
                            <b><?php echo e(__('Total:')); ?> $<?php echo e($datetotal); ?></b><br>
  </div>
</div>


<div class="row">
<div class="column1">

</div>
<div class="column1">
   
</div>
<div class="column1"><br><br><br><br>
    <b>-------------</b><br>
    <b><?php echo e(__('Authorized')); ?></b><br>
  </div>
</div>
<br>
     <p><?php echo e(__('Please contact us for more information about payment options')); ?></p>
     <p><?php echo e(__('Thank you for your booking')); ?></p>

 <div class="heeading"></div>
</div><?php /**PATH C:\xampp\htdocs\hrms\resources\views/administrator/hrm/increment/salaryStatementPdf.blade.php ENDPATH**/ ?>