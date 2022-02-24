@extends('Panel::layouts.master')

@section('title', 'Edit User')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Edit {{ $user->name }} User">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Edit User</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('users.update', $user->id) }}"
                                    id="campaign-form" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="name" title="Name" />
                                                <x-panel-input name="name" id="name" placeholder="Enter Name"
                                                value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="email" title="Email" />
                                                <x-panel-input type="email" name="email" id="email"
                                                placeholder="Enter Email" value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="phone" title="Phone" />
                                                <x-panel-input type="number" name="phone" id="phone" placeholder="Enter Phone"
                                                value="{{ $user->phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="passwords" title="Password (No Required)" />
                                                <x-panel-input type="password" name="passwords" id="passwords"
                                                placeholder="Enter Password" value="{{ $user->passwords }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">{{-- tODO For Component checkbox --}}
                                                <input class="form-check-input" type="checkbox" id="email_verified_at"
                                                name="email_verified_at" value="checked" checked="">
{{--                                                <x-panel-input class="form-check-input" type="checkbox" name="email_verified_at"--}}
{{--                                                id="email_verified_at" value="checked" @if($user->email_verified_at) checked @endif />--}}
                                                <x-panel-label for="email_verified_at" title="Email Verified" />
                                            </div>
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

@section('js')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Modules\User\Http\Requests\UserRequest', '#campaign-form'); !!}
@endsection


