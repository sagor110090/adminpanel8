<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="turbolinks-visit-control" content="reload"> --}}
    {{-- <meta name="turbolinks-cache-control" content="no-cache"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif Laravel
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    @stack('css')
    <script src="{{ asset('js/app.js') }}"></script>


<body>

    <div id="db-wrapper">

        @include('layouts.parts.sidebar')
        </ul>
        </ul>
    </div>
    </nav>
    <div id="page-content">
        @include('layouts.parts.nav')
        <!-- Container fluid -->
        <div class="bg-primary pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    </div>
    @include('layouts.parts.script')

</body>

</html>
