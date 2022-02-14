@extends('Auth::layouts.master')

@section('title' , 'Register Page')

@section('content')
    <div class="auth-inner row m-0">
        <a class="brand-logo" href="{{ route('landing.index') }}">
            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                <defs>
                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                        <stop stop-color="#000000" offset="0%"></stop>
                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                        <g id="Group" transform="translate(400.000000, 178.000000)">
                            <path class="text-primary" id="Path"
                                  d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                  style="fill: currentColor"></path>
                            <path id="Path1"
                                  d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                  fill="url(#linearGradient-1)" opacity="0.2"></path>
                            <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                     points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                            <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                     points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                     points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                        </g>
                    </g>
                </g>
            </svg>
            <h2 class="brand-text text-primary ms-1">{{ config('app.name') }}</h2>
        </a>
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
                <x-auth-o-auth>
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
