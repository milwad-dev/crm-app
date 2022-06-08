@extends('Auth::layouts.master')

@section('title', 'Verify Reset Password Email')

@section('content')
    <div class="auth-inner row m-0">
        @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{ asset('panel/images/auth/two-steps-verification-illustration.svg') }}"
                     alt="two steps verification" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bolder mb-1">Verify Email For Reset Password &#x1F4AC;</h2>
                <p class="card-text mb-75">We sent a verification code to your email. Enter the code from the email in the field below.</p>
                <form class="mt-2" action="{{ route('passwords.checkVerifyCode') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ request()->email }}">
                    <h6>Type your 6 digit security code</h6>
                    <div class="mb-1">
                        <x-auth-input type="verify_code" id="verify_code" name="verify_code" placeholder="Enter Your Verify Code"
                        index="1" autofocus />
                    </div>
                    <x-auth-button tabindex="2" title="Verify my account" />
                </form>
                <p class="text-center mt-2">
                    <span>Didn&rsquo;t get the code?</span>
                    <a href="#" onclick="event.preventDefault();document.getElementById('resend-code').submit()">
                        <span>&nbsp;Resend</span>
                    </a>
                </p>
            </div>
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
