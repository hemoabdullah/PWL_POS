@extends('layouts.main')

@section('title', 'Items')

@section('contents')
    {{-- Alert Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    {{-- Contents --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p class="my-0 fs-4">Items Table</p>
                <div class="d-flex align-items-center">
                    <a href="{{ route('items.store-page') }}" class="btn btn-primary btn-sm ml-0 ml-md-2">Create New Item</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="itemsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const itemsTable = document.getElementById('itemsTable');

        let itemsDataTable = $(itemsTable).DataTable({
            serverSide: true,
            ajax: {
                url: "{{ route('items.list') }}",
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
                    data: "item_code",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "item_name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "category.category_name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "actions",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    </script>
@endpush