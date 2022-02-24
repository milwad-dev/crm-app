@extends('Panel::layouts.master')

@section('title', 'Manage Users')
{{-- TODO DATATABLE --}}
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Manage Users" buttonTitle="Create User" buttonRoute="{{ route('users.create') }}">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Manage Users</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Users</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Verify</th>
                                        <th>Roles</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-{{ $user->emailVerifyCss() }} me-1">
                                                    {{ $user->emailVerifyText() }}
                                                </span>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($user->roles as $role)
                                                        <a onclick="deleteItem(event, '{{ route('users.removeRole',
                                                            ["user" => $user->id, "role" => $role->name]) }}', 'li')">
                                                            <span class="badge bg-primary">
                                                                <span>{{ $role->name }}</span>
                                                                <i data-feather='delete'></i>
                                                            </span>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a onclick="deleteItem(event, '{{ route('users.destroy'
                                                            , $user->id) }}')">
                                                            <i data-feather="delete"></i>
                                                        </a>
                                                        <a href="{{ route('users.edit', $user->id) }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#addNewCard"
                                                            onclick="setFormAction({{ $user->id }})">
                                                            <i data-feather='plus-circle'></i>
                                                        </a>
{{--                                                        <a href="{{ route('users.change_status_verify_email', $user->id) }}">--}}
{{--                                                            <i data-feather="refresh-cw"></i>--}}
{{--                                                        </a>--}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                    @include('User::modalRole')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function setFormAction(userId) {
            $("#select-role-form").attr('action', '{{ route('users.addRole', 0) }}'.replace('/0/', '/' + userId + '/' ))
        }
    </script>
@endsection

