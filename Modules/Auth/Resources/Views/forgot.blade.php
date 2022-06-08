@extends('Auth::layouts.master')

@section('title' , 'Forgot Password Page')

@section('content')
    <div class="auth-inner row m-0">
        @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{ asset('panel/images/auth/forgot-passwords-v2.svg') }}" alt="Forgot password V2" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="auth-forgot-password-form mt-2" action="{{ route('passwords.sendVerifyCodeEmail') }}" method="GET">
                    <div class="mb-1">
                        <x-auth-label for="email" title="email" />
                        <x-auth-input type="email" id="email" name="email" placeholder="Enter Your Email Address"
                        index="1" autofocus />
                    </div>
                    <x-auth-button tabindex="2" title="Send reset link" />
                </form>
                <p class="text-center mt-2">
                    <a href="{{ route('login') }}"><i data-feather="chevron-left"></i> Back to login</a>
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
