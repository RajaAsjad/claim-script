<?php

function site_page_url(string $routeName): string
{
    if ($routeName === 'home' || ! config('site.home_only')) {
        return route($routeName);
    }

    return '#';
}

function site_pages_enabled(): bool
{
    return ! config('site.home_only');
}
