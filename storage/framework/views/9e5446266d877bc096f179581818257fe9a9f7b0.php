<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e(__('Attendance Report')); ?></title>

   

</head>
<body>
    <div class="header">
        <img src="<?php echo e(url('backend/img/corporatelogo.png')); ?>">
    </div>
    <div class="footer"><p><?php echo e(__('Page:')); ?> <span class="pagenum"></span></p></div>
    <div class="container table-responsive">
       <table>
        <thead>
            <tr>
                <th><?php echo e(__('SL')); ?></th>
                <th><?php echo e(__('Name')); ?></th>
                <th><?php echo e(__('ID')); ?></th>
                <th><?php echo e(__('Designation')); ?></th> 
                <th><?php echo e(__('Total Attendance')); ?></th>
                <th><?php echo e(__('Total Absence')); ?></th>
                <th><?php echo e(__('Casual Leave')); ?></th>
                <th><?php echo e(__('Earned Leave')); ?></th>
                <th><?php echo e(__('Advance Leave')); ?></th>
                <th><?php echo e(__('Special Leave')); ?></th>
                <th><?php echo e(__('Total Leave')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php ($sl = 1); ?>
            <?php ($total_leave = 0); ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($sl++); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->employee_id); ?></td>
                <td><?php echo e($user->designation); ?></td>
                <td>
                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $attendance->user_id): ?>
                    <?php echo e($attendance->total_attendances); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                                <td>
                                    <?php $__currentLoopData = $absences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $absence->user_id): ?>
                                    <?php echo e($absence->total_absences); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                <td>
                    <?php $__currentLoopData = $casual_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casual_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $casual_leave->user_id): ?>
                    <?php echo e($casual_leave->total_casual_leaves); ?>

                    <?php ($total_leave += $casual_leave->total_casual_leaves); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $__currentLoopData = $earned_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earned_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $earned_leave->user_id): ?>
                    <?php echo e($earned_leave->total_earned_leaves); ?>

                    <?php ($total_leave += $earned_leave->total_earned_leaves); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td> 
                <td>
                    <?php $__currentLoopData = $advance_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advance_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $advance_leave->user_id): ?>
                    <?php echo e($advance_leave->total_advance_leave); ?>

                    <?php ($total_leave += $advance_leave->total_advance_leave); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                                <td>
                                    <?php $__currentLoopData = $special_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == $special_leave->user_id): ?>
                                    <?php echo e($special_leave->total_special_leave); ?>

                                    <?php ($total_leave += $special_leave->total_special_leave); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                <td>
                    <?php echo e($total_leave); ?>

                    <?php ($total_leave = 0); ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div>
        <p><?php echo e(__('Prepared By')); ?></p>
        <p><?php echo e(__('Authorised Signature')); ?></p>
    </div>
</div>
</body>
</html><?php /**PATH D:\xampp\htdocs\Laravel-HRMS\resources\views/administrator/hrm/leave_application/pdf_reports.blade.php ENDPATH**/ ?>