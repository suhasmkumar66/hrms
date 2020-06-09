
<div class="invoice">
  <div class="heeading">
    <div class="invo"><b><?php echo e(__('Attendance Sheet')); ?></b></div></div>
    <div class="row">
      <div class="column">
        
        <img src="<?php echo e(asset('profile_picture/'.auth()->user()->avatar)); ?>" class="img"><br><br><br>
        
        <?php $users= \App\User::all();
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
        <?php echo e(__('EMP ID NO:')); ?> <?php echo e($empid); ?><br>
        
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
          <?php echo e(__('Date of Birth:')); ?> <?php echo e($datebirth); ?><br>
          <?php echo e(__('Joining Date:')); ?> <?php echo e($joindate); ?><br>
          <?php echo e(__('Contact:')); ?> <?php echo e($contact); ?><br>
          <?php echo e(__('Present Address:')); ?> <?php echo e($prsaddress); ?><br>
        <?php echo e(__('Permanent Address:')); ?> <?php echo e($prmaddress); ?></p>
      </div>
    </div>
    
    <div class="row">
      <table class="mytable" border="1">
        <thead>
          <tr>
            <th><?php echo e(__('SL')); ?></th>
            <th><?php echo e(__('User ID')); ?></th>
            <th><?php echo e(__('Attendend By')); ?></th>
            <th><?php echo e(__('Attendance Date')); ?></th>
            <th><?php echo e(__('Attendance Status')); ?></th>
            <th><?php echo e(__('Leave Category')); ?></th>
            <th><?php echo e(__('In Time')); ?></th>
            <th><?php echo e(__('Out Time')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $sl=1;?>
          <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($sl++); ?></td>
            <td><?php echo e(__('ATTD')); ?><?php echo e($attd->id); ?></td>
            <td><?php echo e(Auth::user()->name); ?></td>
            <td><?php echo e($attd->attendance_date); ?></td>
            <td>
              <?php if($attd->attendance_status==1): ?>
              <b class="btn btn-success"><?php echo e(__('Present')); ?></b>
              <?php else: ?>
              <b class="btn btn-danger"><?php echo e(__('Absence')); ?></b>
              <?php endif; ?>
            </td>
            <td>
              <?php if($attd->leave_category_id==0): ?>
              <b class="btn btn-primary"><?php echo e(__('No Leave')); ?></b>
              <?php else: ?>
              <b class="btn btn-success"><?php echo e(__('Leave')); ?></b>
              <?php endif; ?>
            </td>
            <td><?php echo e($attd->check_in); ?></td>
            <td><?php echo e($attd->check_out); ?></td>
            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th colspan="7"><?php echo e(__('Total')); ?></th>
            <th><?php echo e($attendance->count()); ?> days</th>
          </tr>
          <tr>
            <th colspan="7"><?php echo e(__('Total')); ?></th>
            <th><?php echo e($attds->count()); ?> <?php echo e(__('Present')); ?></th>
          </tr>
          <tr>
            <th colspan="7"><?php echo e(__('Total')); ?></th>
            <th><?php echo e($abs->count()); ?> <?php echo e(__('Absence')); ?></th>
          </tr>
        </tbody>
      </table>
      
      <div class="column1">
      </div>
      <div class="column1">
      </div>
      <div class="column1">
        
        
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
  </div><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/hrm/attendance/detailsAttendenseReportPdf.blade.php ENDPATH**/ ?>