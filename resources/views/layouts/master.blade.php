<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ConvertedIn - @yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/notyf/notyf.min.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @stack('styles')
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{asset('dist/js/demo-theme.min.js')}}"></script>
    <div class="page">
        @include('layouts.navbar')
        <div class="page-wrapper">
            @yield('content')

            @include('layouts.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/notyf/notyf.min.js') }}"></script>

    @include('layouts.notyf')
    @stack('scripts')
</body>

</html>
