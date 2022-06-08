@extends('Auth::layouts.master')

@section('title', 'Reset Password Page')

@section('content')
    <div class="auth-inner row m-0">
        @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{ asset('panel/images/auth/reset-password-v2.svg') }}" alt="Reset Password V2" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Reset Password 🔒</h2>
                <p class="card-text mb-2">Your new password must be different from previously used passwords</p>
                <form class="auth-reset-password-form mt-2" action="{{ route('passwords.update') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <x-auth-label for="password" title="New Password" />
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <x-auth-input class="form-control form-control-merge" type="password" id="password"
                            name="password" placeholder="Enter Your Password" index="1" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="reset-password-confirm">Confirm Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <x-auth-input class="form-control form-control-merge" type="password" id="password_confirmation"
                            name="password_confirmation" placeholder="Enter Your Confirm Password" index="2" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>
                    <x-auth-button tabindex="3" title="Set New Password" />
                </form>
                <p class="text-center mt-2">
                    <a href="{{ route('login') }}">
                        <i data-feather="chevron-left"></i> Back to login
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
    <script>
        toastr.options = {
            "preventDuplicates": true
        }
    </script>
@endsection
