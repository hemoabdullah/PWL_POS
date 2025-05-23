<div class="modal fade" id="updateUserAjaxModal" tabindex="-1" role="dialog" aria-labelledby="updateUserAjaxModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserAjaxModalLabel">Update User (AJAX)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateUserAjaxForm">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                                <small class="error-text text-danger" id="error-username"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <small class="error-text text-danger" id="error-name"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="level_id">Level</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    <option value="">Select Level</option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->level_id); ?>"><?php echo e($level->level_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="error-text text-danger" id="error-level_id"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="username">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <small class="error-text text-danger" id="error-password"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" id="updateUserAjaxButton">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        $(document).on('click', '.update-user-ajax-btn', function() {
            let userId = $(this).data('id');

            $.ajax({
                url: `/users/${userId}/show-ajax`,
                type: 'GET',
                success: function(response) {
                    const data = response.data;
                    $('#updateUserAjaxModal #user_id').val(data.user_id);
                    $('#updateUserAjaxModal #username').val(data.username);
                    $('#updateUserAjaxModal #name').val(data.name);
                    $('#updateUserAjaxModal #level_id').val(data.level_id);
                },
                error: function(xhr) {
                    console.error('Error fetching user data:', xhr);
                }
            });
        });
    </script>

    
    <script>
        $(document).on('click', '#updateUserAjaxButton', function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to update this category.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateUserAjaxForm').submit();
                }
            });
        });

        $(document).ready(function() {
            $('#updateUserAjaxForm').validate({
                rules: {
                    username: {
                        required: true,
                        maxlength: 20
                    },
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    level_id: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                submitHandler: function(form) {
                    const userId = $('#updateUserAjaxModal #user_id').val();

                    $.ajax({
                        url: `/users/${userId}/update-ajax`,
                        type: 'PATCH',
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.success) {
                                $('#updateUserAjaxModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message
                                });

                                $('#usersTable').DataTable().ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.errors, function(key, value) {
                                    $('#error-' + key).text(value);
                                })

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
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
<?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/user/components/update-ajax.blade.php ENDPATH**/ ?>