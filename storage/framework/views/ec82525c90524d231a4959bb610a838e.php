<?php $__env->startSection('title', 'Users Data'); ?>

<?php $__env->startSection('table-title', 'USERS DATA REPORT'); ?>

<?php $__env->startSection('contents'); ?>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->level->level_name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/user/export-pdf.blade.php ENDPATH**/ ?>