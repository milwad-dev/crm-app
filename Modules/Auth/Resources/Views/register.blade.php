@extends('Auth::layouts.master')

@section('title' , 'Register Page')

@section('content')
    <div class="auth-inner row m-0">
        @include('Auth::brand-logo')
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img src="{{ asset('panel\images\auth\register-v2.svg') }}" class="img-fluid" alt="Register" />
            </div>
        </div>
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Adventure starts here 🚀</h2>
                <p class="card-text mb-2">Make your app management easy and fun!</p>
                <form class="auth-register-form mt-2" id="register-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <x-auth-label for="name" title="name" />
                        <x-auth-input id="name" name="name" placeholder="Enter Your Name" index="1" />
                    </div>
                    <div class="mb-1">
                        <x-auth-label for="email" title="email" />
                        <x-auth-input type="email" id="email" name="email" placeholder="Enter Your Email Address" index="2" />
                    </div>
                    <div class="mb-1">
                        <x-auth-label for="phone" title="phone" />
                        <x-auth-input type="number" id="phone" name="phone" placeholder="Enter Your Phone" index="3" />
                    </div>
                    <div class="mb-1">
                        <x-auth-label for="password" title="password" />
                        <x-auth-input type="password" id="password" name="password" placeholder="Enter Your Password" index="4" />
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <x-auth-label class="form-check-label" for="privacy" title="I agree to privacy policy & terms" />
                            <x-auth-input class="form-check-input" type="checkbox" id="privacy" name="privacy" index="4" />
                        </div>
                    </div>
                    <x-auth-button title="Sign up" />
                </form>
                <p class="text-center mt-2">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a>
                </p>
                <div class="divider my-2">
                    <div class="divider-text">or</div>
                </div>
                <x-auth-o-auth> {{-- TODO --}}
                    <a class="btn btn-gmail" href="#"><i data-feather="mail"></i></a>
                </x-auth-o-auth>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Modules\Auth\Http\Requests\RegisterRequest', '#register-form'); !!}
@endsection
