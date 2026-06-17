<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'ClaimScript LLC provides medical billing and revenue cycle management for outpatient healthcare providers. Transparency, structured processes, and dedicated support.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ClaimScript LLC | Revenue Cycle Management')</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #page-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #0E1A31 0%, #152440 50%, #0E1A31 100%);
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #page-loader.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .loader-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        .loader-logo-wrap {
            position: relative;
            width: 88px;
            height: 88px;
        }
        .loader-ring {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: #5FA8FF;
            border-right-color: rgba(95, 168, 255, 0.3);
            animation: loaderSpin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        }
        .loader-ring:nth-child(2) {
            inset: -16px;
            border-top-color: rgba(95, 168, 255, 0.4);
            animation-duration: 1.8s;
            animation-direction: reverse;
        }
        .loader-icon {
            width: 88px;
            height: 88px;
            object-fit: contain;
            animation: loaderPulse 1.5s ease-in-out infinite;
        }
        .loader-progress-track {
            width: 200px;
            height: 3px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }
        .loader-progress-bar {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #5FA8FF, #6D9EEB);
            box-shadow: 0 0 12px rgba(95, 168, 255, 0.6);
            transition: width 0.15s ease;
        }
        .loader-text {
            font-family: Inter, system-ui, sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
        }
        .loader-text span {
            color: #5FA8FF;
        }
        @keyframes loaderSpin {
            to { transform: rotate(360deg); }
        }
        @keyframes loaderPulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.85; }
        }
    </style>
</head>
<body class="min-h-screen">
    <div id="page-loader" role="status" aria-live="polite" aria-label="Loading">
        <div class="loader-inner">
            <div class="loader-logo-wrap">
                <div class="loader-ring"></div>
                <div class="loader-ring"></div>
                <img src="{{ asset('images/logo/logo-icon.png') }}" alt="" class="loader-icon">
            </div>
            <div class="loader-progress-track">
                <div class="loader-progress-bar" id="loader-progress-bar"></div>
            </div>
            <p class="loader-text">Loading <span>ClaimScript</span></p>
        </div>
    </div>

    <script>
        (function () {
            var loader = document.getElementById('page-loader');
            var progressBar = document.getElementById('loader-progress-bar');
            var hidden = false;
            var progress = 0;

            function hideLoader() {
                if (hidden || !loader) return;
                hidden = true;
                loader.classList.add('is-hidden');
                document.body.style.overflow = '';
                window.dispatchEvent(new Event('app:ready'));
            }

            function setProgress(value) {
                progress = Math.min(100, value);
                if (progressBar) progressBar.style.width = progress + '%';
            }

            var tick = setInterval(function () {
                if (progress < 92) setProgress(progress + Math.random() * 14 + 4);
            }, 120);

            window.addEventListener('load', function () {
                clearInterval(tick);
                setProgress(100);
                setTimeout(hideLoader, 400);
            });

            setTimeout(function () {
                clearInterval(tick);
                setProgress(100);
                hideLoader();
            }, 2600);
        })();
    </script>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
