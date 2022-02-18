@extends('Panel::layouts.master')

@section('title', 'Create User')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Create New User">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Create User</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('users.store') }}" id="user-form"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="name" title="Name" />
                                                <x-panel-input name="name" id="name" placeholder="Enter Name"
                                                value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="email" title="Email" />
                                                <x-panel-input type="email" name="email" id="email"
                                                 placeholder="Enter Email" value="{{ old('email') }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="phone" title="Phone" />
                                                <x-panel-input type="number" name="phone" id="phone" placeholder="Enter Phone"
                                                value="{{ old('phone') }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="passwords" title="Password" />
                                                <x-panel-input type="password" name="passwords" id="passwords"
                                                placeholder="Enter Password" value="{{ old('passwords') }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">{{-- tODO For Component checkbox --}}
                                                <input class="form-check-input" type="checkbox" id="email_verified_at"
                                                name="email_verified_at" value="checked" checked="">
                                                <x-panel-label for="email_verified_at" title="Email Verified" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <x-panel-button title="Save Data" />
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

@section('js')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Modules\User\Http\Requests\UserRequest', '#user-form'); !!}
@endsection


