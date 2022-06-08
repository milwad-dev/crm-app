@extends('Auth::layouts.master')

@section('title' , 'Verify Page')

@section('content')
    <div class="auth-inner row m-0">
        @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{ asset('panel/images/auth/verify-email-illustration.svg') }}" alt="Verify" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Verify Email 🔒</h2>
                <p class="card-text mb-2">Enter your email and we'll send you instructions to verify your email</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="auth-forgot-password-form mt-2" action="{{ route('verification.verify') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <x-auth-label for="verify_code" title="Verify Email" />
                        <x-auth-input type="text" id="verify_code" name="verify_code" placeholder="Enter Your Verify Code"
                        index="1" autofocus />
                    </div>
                    <x-auth-button tabindex="2" title="Verify Email" />
                </form>
                <p class="text-center mt-2">
{{--                    <a href="{{ route('verification.resend') }}"><i data-feather="chevron-left"></i> Resend</a>--}}
                    <a href="#" onclick="event.preventDefault();document.getElementById('resend-code').submit()">
                        <i data-feather="chevron-left"></i> Resend
                    </a>
                </p>
                <form id="resend-code" action="{{ route('verification.resend') }}" method="post">
                    @csrf
                </form>
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
