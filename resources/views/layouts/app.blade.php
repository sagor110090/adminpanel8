<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> {{ config('app.name') }} / @isset($pageTitle) {{$pageTitle}}@endisset</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets') }}/img/favicon.ico' />
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href=" {{asset('assets') }}/bundles/jquery-selectric/selectric.css">
    @stack('css')
</head>

<body class="light light-sidebar theme-white">
    <div id="app">
        <div class="loader"></div>
        <button class="btn-progress" hidden></button>
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.parts.navbar')
                @include('layouts.parts.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.parts.footer')
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="{{ asset('assets') }}/js/page/index.js"></script>
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    <script src="{{ asset('assets') }}/bundles/izitoast/js/iziToast.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/sweetalert/sweetalert.min.js"></script>
    @include('layouts.parts.inc')
    @stack('js')

</body>

</html>
