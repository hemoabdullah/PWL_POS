<ol class="breadcrumb float-sm-right">
    <?php $__currentLoopData = $metadata['breadcrumbs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'breadcrumb-item',
            'active' => $loop->last
        ]); ?>">
            <?php if(!$loop->last): ?>
                <a href="<?php echo e(route($breadcrumb['route'])); ?>"><?php echo e($breadcrumb['name']); ?></a>
            <?php else: ?>
                <?php echo e($breadcrumb['name']); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol><?php /**PATH C:\laragon\www\pwl-pos\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>