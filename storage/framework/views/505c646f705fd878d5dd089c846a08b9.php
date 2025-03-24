<?php $__env->startSection('title', 'Levels'); ?>

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
                <p class="my-0 fs-4">Levels Table</p>
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('levels.store-page')); ?>" class="btn btn-primary btn-sm">Create New Level</a>
                    <button type="button" class="btn btn-primary btn-sm ml-0 ml-md-2" data-toggle="modal"
                        data-target="#newLevelAjaxModal">Create New Level (AJAX)</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="levelsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Actions</th>
                        <th>Actions AJAX</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    
    <?php echo $__env->make('pages.level.components.store-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.level.components.update-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.level.components.details-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        $(document).ready(function() {
            const levelsTable = document.getElementById('levelsTable');

            let levelsDataTable = $(levelsTable).DataTable({
                serverSide: true,
                ajax: {
                    url: "<?php echo e(route('levels.list')); ?>",
                    dataType: "JSON",
                    type: "GET",
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "level_code",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "level_name",
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
        });
    </script>

    
    <script>
        $(document).on('click', '.delete-level-ajax-btn', function() {
            let levelId = $(this).data('id');

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
                        url: `/levels/${levelId}/delete-ajax`,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );

                            $('#levelsTable').DataTable().ajax.reload();
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

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pwl-pos\resources\views/pages/level/index.blade.php ENDPATH**/ ?>