<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('Auth::section.meta')

    <title>@yield('title') - {{ config('app.name') }}</title>

    @include('Auth::section.css')
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
data-menu="vertical-menu-modern" data-col="blank-page">
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('Auth::section.js')
</body>
</html>
