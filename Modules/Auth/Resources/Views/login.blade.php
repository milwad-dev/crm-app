@extends('Auth::layouts.master')

@section('title' , 'Login Page')

@section('content')
    <div class="auth-inner row m-0">
       @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{ asset('panel/images/auth/login-v2.svg') }}" alt="Login V2" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Welcome to {{ config('app.name') }}! 👋</h2>
                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                <form class="auth-login-form mt-2" id="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <x-auth-label for="email" title="email" />
                        <x-auth-input type="email" id="email" name="email" placeholder="Enter Your Email Address"
                        index="1" autofocus />
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <x-auth-label for="password" title="password" />
                            <a href="{{ route('passwords.request') }}"><small>Forgot Password?</small></a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <x-auth-input class="form-control form-control-merge" type="password" id="password"
                            name="password" placeholder="Enter Your Password" index="2" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <x-auth-input class="form-check-input" type="checkbox" id="remember" name="remember" index="3" />
                            <x-auth-label class="form-check-label" for="remember" title="Remember Me" />
                        </div>
                    </div>
                    <x-auth-button tabindex="4" title="Sign in" />
                </form>
                <p class="text-center mt-2">
                    <span>You Don't Have Account? </span>
                    <a href="{{ route('register') }}"><span>&nbsp;Create an account</span></a>
                </p>
                <div class="divider my-2">
                    <div class="divider-text">or</div>
                </div>
                <div class="auth-footer-btn d-flex justify-content-center">
                    <x-auth-o-auth> {{-- TODO --}}
                        <a class="btn btn-gmail" href="#"><i data-feather="mail"></i></a>
                    </x-auth-o-auth>
                </div>
            </div>
        </div>
    </div>
@endsection

