<?php $__env->startSection('title', 'Stocks'); ?>

<?php $__env->startSection('contents'); ?>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    
    
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p class="my-0 fs-4">Stocks Table</p>
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('stocks.store-page')); ?>" class="btn btn-primary btn-sm ml-0 ml-md-2">Create New Stock</a>
                    <button type="button" class="btn btn-primary btn-sm ml-0 ml-md-2" data-toggle="modal"
                        data-target="#newStockAjaxModal">Create New Stock (AJAX)</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="stocksTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>QTY</th>
                        <th>Created by</th>
                        <th>Actions</th>
                        <th>Actions AJAX</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    
    <?php echo $__env->make('pages.stock.components.store-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.stock.components.update-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.stock.components.details-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        const stocksTable = document.getElementById('stocksTable');

        let stocksDataTable = $(stocksTable).DataTable({
            serverSide: true,
            ajax: {
                url: "<?php echo e(route('stocks.list')); ?>",
                dataType: "JSON",
                type: "GET",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "item.item_name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "stock_qty",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "user.name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "actions",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "actions-ajax",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    </script>

        
        <script>
            $(document).on('click', '.delete-stock-ajax-btn', function() {
                let stockId = $(this).data('id');
    
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/stocks/${stockId}/delete-ajax`,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
    
                                $('#stocksTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pwl-pos\resources\views/pages/stock/index.blade.php ENDPATH**/ ?>