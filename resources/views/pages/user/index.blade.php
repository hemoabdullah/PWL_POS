@extends('layouts.main')

@section('title', 'Users')

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
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->level_id }}">{{ $level->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('users.store-page') }}" class="btn btn-primary btn-sm ml-0 ml-md-2">Create New User</a>
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
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const usersTable = document.getElementById('usersTable');

        let usersDataTable = $(usersTable).DataTable({
            serverSide: true,
            ajax: {
                url: "{{ route('users.list') }}",
                dataType: "JSON",
                type: "GET",
                data: function (d) {
                    console.log($('#level_id').val());
                }
            },
            columns: [
                {
                    data: "Hammam",
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
            ],
        });

        $('#level_id').on('change', function () {
            usersDataTable.ajax.reload();
        });
    </script>
@endpush
