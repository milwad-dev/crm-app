<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        @include('Panel::section.meta')

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Panel::section.css')
    </head>
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern">
        @include('Panel::section.header')
        @include('Panel::section.menu')
            @yield('content')
        @include('Panel::section.customizer')
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        @include('Panel::section.footer')
        @include('Panel::section.js')
    </body>
</html>
