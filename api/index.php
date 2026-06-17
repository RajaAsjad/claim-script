<?php

/**
 * Vercel serverless entry point for Laravel.
 * Serves static files from public/ before bootstrapping the app.
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/');

if ($uri !== '/' && $uri !== '') {
    $publicPath = realpath(__DIR__.'/../public'.str_replace("\0", '', $uri));

    if (
        $publicPath !== false
        && str_starts_with($publicPath, realpath(__DIR__.'/../public'))
        && is_file($publicPath)
    ) {
        $extension = strtolower(pathinfo($publicPath, PATHINFO_EXTENSION));
        $mimes = [
            'css' => 'text/css; charset=UTF-8',
            'js' => 'application/javascript; charset=UTF-8',
            'json' => 'application/json; charset=UTF-8',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'txt' => 'text/plain; charset=UTF-8',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'otf' => 'font/otf',
        ];

        header('Content-Type: '.($mimes[$extension] ?? 'application/octet-stream'));
        header('Cache-Control: public, max-age=31536000, immutable');
        readfile($publicPath);

        return;
    }
}

require __DIR__.'/../public/index.php';
