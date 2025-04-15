<?php $__env->startSection('title', 'Categories Data'); ?>

<?php $__env->startSection('table-title', 'CATEGORIES DATA REPORT'); ?>

<?php $__env->startSection('contents'); ?>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Code</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($category->category_code); ?></td>
                    <td><?php echo e($category->category_name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/category/export-pdf.blade.php ENDPATH**/ ?>