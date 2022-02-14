<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Landing::section.meta')

        <title>@yield('title') - {{ config('app.name') }}</title>

       @include('Landing::section.css')
    </head>
    <body id="home-version-1" class="home-version-4" data-style="default">
        @include('Landing::section.button-to-top')
{{--        @include('Landing::section.preloader')--}}
        <div id="main_content">
            @include('Landing::section.header')
                @yield('content')
            @include('Landing::section.footer')
        </div>
        @include('Landing::section.js')
    </body>
</html>
