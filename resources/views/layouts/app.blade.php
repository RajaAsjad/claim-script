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
            background: #0E1A31;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #page-loader.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .loader-stage {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }
        #loader-canvas {
            display: block;
            width: 140px;
            height: 140px;
        }
        .loader-brand {
            font-family: Inter, system-ui, sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #fff;
        }
        .loader-brand em {
            font-style: normal;
            color: #5FA8FF;
        }
        .loader-bar {
            width: 180px;
            height: 3px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            overflow: hidden;
        }
        .loader-bar-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #5FA8FF, #6D9EEB);
            box-shadow: 0 0 10px rgba(95, 168, 255, 0.5);
            transition: width 0.12s linear;
        }
        .loader-status {
            font-family: Inter, system-ui, sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
        }
    </style>
</head>
<body class="min-h-screen">
    <div id="page-loader" role="status" aria-live="polite" aria-label="Loading">
        <div class="loader-stage">
            <canvas id="loader-canvas" width="140" height="140" aria-hidden="true"></canvas>
            <p class="loader-brand">Claim<em>Script</em></p>
            <div class="loader-bar" aria-hidden="true">
                <div class="loader-bar-fill" id="loader-bar-fill"></div>
            </div>
            <p class="loader-status" id="loader-status">Initializing</p>
        </div>
    </div>

    <script>
        (function () {
            var loader = document.getElementById('page-loader');
            var canvas = document.getElementById('loader-canvas');
            var bar = document.getElementById('loader-bar-fill');
            var status = document.getElementById('loader-status');
            var hidden = false;
            var progress = 0;
            var frameId;

            function hideLoader() {
                if (hidden || !loader) return;
                hidden = true;
                loader.classList.add('is-hidden');
                document.body.style.overflow = '';
                if (frameId) cancelAnimationFrame(frameId);
                window.dispatchEvent(new Event('app:ready'));
            }

            function setProgress(value, label) {
                progress = Math.min(100, value);
                if (bar) bar.style.width = progress + '%';
                if (status && label) status.textContent = label;
            }

            var tick = setInterval(function () {
                if (progress < 92) {
                    setProgress(progress + Math.random() * 14 + 3, progress < 40 ? 'Loading assets' : progress < 75 ? 'Preparing interface' : 'Almost ready');
                }
            }, 110);

            window.addEventListener('load', function () {
                clearInterval(tick);
                setProgress(100, 'Ready');
                setTimeout(hideLoader, 350);
            });

            setTimeout(function () {
                clearInterval(tick);
                setProgress(100, 'Ready');
                hideLoader();
            }, 2600);

            if (!canvas) return;
            var ctx = canvas.getContext('2d');
            var w = canvas.width;
            var h = canvas.height;
            var cx = w / 2;
            var cy = h / 2;
            var time = 0;
            var nodes = Array.from({ length: 10 }, function (_, i) {
                var angle = (i / 10) * Math.PI * 2;
                return { angle: angle, radius: 46, size: 2 + (i % 3) };
            });

            function drawLoader() {
                time += 0.018;
                ctx.clearRect(0, 0, w, h);

                ctx.beginPath();
                ctx.arc(cx, cy, 52, 0, Math.PI * 2);
                ctx.strokeStyle = 'rgba(95, 168, 255, 0.12)';
                ctx.lineWidth = 1;
                ctx.stroke();

                nodes.forEach(function (node, i) {
                    node.angle += 0.012 + i * 0.001;
                    var x = cx + Math.cos(node.angle + time) * node.radius;
                    var y = cy + Math.sin(node.angle + time) * node.radius;

                    for (var j = i + 1; j < nodes.length; j++) {
                        var other = nodes[j];
                        var ox = cx + Math.cos(other.angle + time) * other.radius;
                        var oy = cy + Math.sin(other.angle + time) * other.radius;
                        var dx = x - ox;
                        var dy = y - oy;
                        var dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 70) {
                            ctx.beginPath();
                            ctx.moveTo(x, y);
                            ctx.lineTo(ox, oy);
                            ctx.strokeStyle = 'rgba(95, 168, 255, ' + (0.35 * (1 - dist / 70)) + ')';
                            ctx.lineWidth = 1;
                            ctx.stroke();
                        }
                    }

                    ctx.beginPath();
                    ctx.moveTo(cx, cy);
                    ctx.lineTo(x, y);
                    ctx.strokeStyle = 'rgba(95, 168, 255, 0.2)';
                    ctx.lineWidth = 1;
                    ctx.stroke();

                    ctx.beginPath();
                    ctx.arc(x, y, node.size, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(95, 168, 255, 0.85)';
                    ctx.fill();
                });

                ctx.beginPath();
                ctx.arc(cx, cy, 8, 0, Math.PI * 2);
                ctx.fillStyle = '#ffffff';
                ctx.fill();

                ctx.beginPath();
                ctx.arc(cx, cy, 14, 0, Math.PI * 2);
                ctx.strokeStyle = 'rgba(95, 168, 255, 0.55)';
                ctx.lineWidth = 2;
                ctx.stroke();

                frameId = requestAnimationFrame(drawLoader);
            }

            drawLoader();
        })();
    </script>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <canvas id="cursor-canvas" class="cursor-canvas" aria-hidden="true"></canvas>

    @stack('scripts')
</body>
</html>
