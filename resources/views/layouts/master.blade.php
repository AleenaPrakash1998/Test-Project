<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') @hasSection('title')
            |
        @endif Admin| Shamal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"/>
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css" rel="stylesheet">
    <link href="https://www.jquery-az.com/boots/css/bootstrap-colorpicker/bootstrap-colorpicker.css" rel="stylesheet">
    <link href="https://www.jquery-az.com/boots/css/bootstrap-colorpicker/main.css" rel="stylesheet">
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.sidebar')
        <div class="layout-page">
            @include('layouts.header')
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>

<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- jQuery Validate CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    (function (document, window, $) {
        'use strict';

        <?php
        $alerts = ['success', 'info', 'warning', 'error'];
        ?>

            @foreach($alerts as $alert)
            @if(session()->has($alert))
            toastr['{{ $alert }}']('{{ session()->get($alert) }}');
        @endif
        @endforeach

        <?php
        session()->forget($alerts);
        ?>

    })(document, window, jQuery);
</script>

<script src="https://www.jquery-az.com/boots/js/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>

@stack('custom-scripts')
</body>
</html>
