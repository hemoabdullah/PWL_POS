<?php $__env->startSection('title', 'Users'); ?>

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
                <p class="my-0 fs-4">Users Table</p>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="dropdown-menu px-2 py-2" style="width: 216px;">
                            <div class="d-flex flex-column">
                                <label for="level_id">Level</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    <option value="">All Level</option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->level_id); ?>"><?php echo e($level->level_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e(route('users.store-page')); ?>" class="btn btn-primary btn-sm ml-0 ml-md-2">Create New User</a>
                    <button type="button" class="btn btn-primary btn-sm ml-0 ml-md-2" data-toggle="modal"
                        data-target="#newUserAjaxModal">Create New User (AJAX)</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Actions</th>
                        <th>Actions AJAX</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    
    <?php echo $__env->make('pages.user.components.store-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.user.components.update-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.user.components.details-ajax', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        const usersTable = document.getElementById('usersTable');

        let usersDataTable = $(usersTable).DataTable({
            serverSide: true,
            ajax: {
                url: "<?php echo e(route('users.list')); ?>",
                dataType: "JSON",
                type: "GET",
                data: function (d) {
                    console.log($('#level_id').val());
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "username",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "level.level_name",
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

        $('#level_id').on('change', function () {
            usersDataTable.ajax.reload();
        });
    </script>

    
    <script>
        $(document).on('click', '.delete-user-ajax-btn', function() {
            let userId = $(this).data('id');

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
                        url: `/users/${userId}/delete-ajax`,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );

                            $('#usersTable').DataTable().ajax.reload();
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

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/user/index.blade.php ENDPATH**/ ?>