@extends('Panel::layouts.master')

@section('title', 'Manage Roles')

{{-- TODO DATATABLE --}}
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Manage Roles" buttonTitle="Create Role" buttonRoute="{{ route('role-permissions.create') }}">
            <li class="breadcrumb-item">
                <a href="{{ route('role-permissions.index') }}">Role</a>
            </li>
            <li class="breadcrumb-item active">Manage Roles</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Roles</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($role->permissions as $permission)
                                                        <li class="badge bg-primary">{{ $permission->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a onclick="deleteItem(event, '{{ route('role-permissions.destroy'
                                                            , $role->id) }}')">
                                                            <i data-feather="delete"></i>
                                                        </a>
                                                        <a href="{{ route('role-permissions.edit', $role->id) }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

