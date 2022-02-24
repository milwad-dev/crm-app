@extends('Panel::layouts.master')

@section('title', 'Create Role')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Create New Role">
            <li class="breadcrumb-item">
                <a href="{{ route('role-permissions.index') }}">Role</a>
            </li>
            <li class="breadcrumb-item active">Create Role</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('role-permissions.store') }}" id="role-form"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <x-panel-label for="name" title="Name" />
                                                <x-panel-input name="name" id="name" placeholder="Enter Name"
                                                value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            @foreach ($permissions as $permission)
                                                <div class="mb-1">
                                                    <label class="form-check-label" for="permissions[{{ $permission->name }}]">
                                                        <x-panel-input type="checkbox" class="form-check-input"
                                                        name="permissions[{{ $permission->name }}]"
                                                        id="permissions[{{ $permission->name }}]"
                                                        value="{{ $permission->name }}" />
                                                        {{ $permission->name }}
                                                    </label>
                                                    {{-- TODO FOR OLD --}}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <x-panel-button />
                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
