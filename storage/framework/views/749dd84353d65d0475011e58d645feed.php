<?php $__env->startSection('title', 'Items Data'); ?>

<?php $__env->startSection('table-title', 'ITEMS DATA REPORT'); ?>

<?php $__env->startSection('contents'); ?>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Buy Price</th>
                <th>Sell Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($item->item_code); ?></td>
                    <td><?php echo e($item->item_name); ?></td>
                    <td><?php echo e($item->category->category_name); ?></td>
                    <td><?php echo e($item->item_buy_price); ?></td>
                    <td><?php echo e($item->item_sell_price); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/item/export-pdf.blade.php ENDPATH**/ ?>