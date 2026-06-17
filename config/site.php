<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Home Page Only Mode
    |--------------------------------------------------------------------------
    |
    | When true, only the home page is accessible. Header/footer menus still
    | show page names but links point to "#". Set SITE_HOME_ONLY=false in
    | .env (or Vercel env) to re-enable all pages.
    |
    */

    'home_only' => env('SITE_HOME_ONLY', true),

    'social' => [
        'linkedin' => env('SOCIAL_LINKEDIN', '#'),
        'facebook' => env('SOCIAL_FACEBOOK', '#'),
        'x' => env('SOCIAL_X', '#'),
        'instagram' => env('SOCIAL_INSTAGRAM', '#'),
    ],

];
