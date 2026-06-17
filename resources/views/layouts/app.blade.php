<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'ClaimScript LLC — Medical billing and revenue cycle management for outpatient healthcare providers. Transparency, structured processes, and dedicated support.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ClaimScript LLC — Revenue Cycle Management')</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div id="page-loader" aria-hidden="true">
        <div class="loader-inner">
            <div class="loader-logo-wrap">
                <div class="loader-ring"></div>
                <div class="loader-ring"></div>
                <img src="{{ asset('images/logo/logo-icon.png') }}" alt="" class="loader-icon">
            </div>
            <div class="loader-progress-track">
                <div class="loader-progress-bar"></div>
            </div>
            <p class="loader-text">Loading <span>ClaimScript</span></p>
        </div>
    </div>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
