<?php $__env->startSection('title', 'Details Item'); ?>

<?php $__env->startSection('contents'); ?>
    <div class="card">
        <div class="card-header">
            <p class="fs-5 my-0">Item Details Data</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">ID</p>
                        <p class="my-0"><?php echo e($item->item_id); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">Code</p>
                        <p class="my-0"><?php echo e($item->item_code); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">Name</p>
                        <p class="my-0"><?php echo e($item->item_name); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">Category</p>
                        <p class="my-0"><?php echo e($item->category->category_name); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mt-0 mt-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">Buy Price</p>
                        <p class="my-0"><?php echo e('Rp ' . number_format($item->item_buy_price, 0, ',', '.')); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mt-0 mt-md-3">
                    <div class="d-flex flex-column gap-1">
                        <p class="fs-5 my-0">Sell Price</p>
                        <p class="my-0"><?php echo e('Rp ' . number_format($item->item_sell_price, 0, ',', '.')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(route('items.page')); ?>" class="btn btn-danger btn-sm">Back</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pwl-pos\resources\views/pages/item/show.blade.php ENDPATH**/ ?>