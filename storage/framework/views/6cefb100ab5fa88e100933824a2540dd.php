<div class="modal fade" id="updateItemAjaxModal" tabindex="-1" role="dialog" aria-labelledby="updateItemAjaxModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateItemAjaxModalLabel">Update Item (AJAX)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateItemAjaxForm">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="item_id" id="item_id">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="item_code">Code</label>
                                <input type="text" name="item_code" id="item_code" class="form-control">
                                <small class="error-text text-danger" id="error-item_code"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="item_name">Name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control">
                                <small class="error-text text-danger" id="error-item_name"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="error-text text-danger" id="error-category_id"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="item_buy_price">Buy Price</label>
                                <input type="number" name="item_buy_price" id="item_buy_price" class="form-control">
                                <small class="error-text text-danger" id="error-item_buy_price"></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="item_sell_price">Sell Price</label>
                                <input type="text" name="item_sell_price" id="item_sell_price" class="form-control">
                                <small class="error-text text-danger" id="error-item_sell_price"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" id="updateItemAjaxButton">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        $(document).on('click', '.update-item-ajax-btn', function() {
            let itemId = $(this).data('id');

            $.ajax({
                url: `/items/${itemId}/show-ajax`,
                type: 'GET',
                success: function(response) {
                    const data = response.data;
                    $('#updateItemAjaxModal #item_id').val(data.item_id);
                    $('#updateItemAjaxModal #item_code').val(data.item_code);
                    $('#updateItemAjaxModal #item_name').val(data.item_name);
                    $('#updateItemAjaxModal #category_id').val(data.category_id);
                    $('#updateItemAjaxModal #item_buy_price').val(data.item_buy_price);
                    $('#updateItemAjaxModal #item_sell_price').val(data.item_sell_price);
                },
                error: function(xhr) {
                    console.error('Error fetching item data:', xhr);
                }
            });
        });
    </script>

    
    <script>
        $(document).on('click', '#updateItemAjaxButton', function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to update this level.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateItemAjaxForm').submit();
                }
            });
        });

        $(document).ready(function() {
            $('#updateItemAjaxForm').validate({
                rules: {
                    item_code: {
                        required: true,
                        maxlength: 10,
                    },
                    item_name: {
                        required: true,
                        maxlength: 100,
                    },
                    category_id: {
                        required: true,
                    },
                    item_buy_price: {
                        required: true,
                    },
                    item_sell_price: {
                        required: true,
                    },
                },
                submitHandler: function(form) {
                    const itemId = $('#updateItemAjaxModal #item_id').val();

                    $.ajax({
                        url: `/items/${itemId}/update-ajax`,
                        type: 'PATCH',
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.success) {
                                $('#updateItemAjaxModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message
                                });

                                $('#itemsTable').DataTable().ajax.reload();
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
<?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/pages/item/components/update-ajax.blade.php ENDPATH**/ ?>