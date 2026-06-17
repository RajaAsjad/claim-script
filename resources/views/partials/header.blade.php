@php
    $navItems = [
        ['route' => 'home', 'label' => 'Home'],
        ['route' => 'services', 'label' => 'Services'],
        ['route' => 'process', 'label' => 'Process'],
        ['route' => 'about', 'label' => 'About'],
        ['route' => 'faq', 'label' => 'FAQ'],
        ['route' => 'contact', 'label' => 'Contact'],
    ];
@endphp

<header class="site-header fixed top-0 z-50 w-full py-4">
    <div class="container-site">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="relative z-10 flex shrink-0 items-center" aria-label="ClaimScript LLC Home">
                <img src="{{ asset('images/logo/logo-dark.png') }}" alt="ClaimScript LLC" class="logo-dark h-10 w-auto md:h-11">
                <img src="{{ asset('images/logo/logo-light.png') }}" alt="ClaimScript LLC" class="logo-light hidden h-10 w-auto md:h-11">
            </a>

            <nav class="hidden items-center gap-8 lg:flex" aria-label="Main navigation">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                       class="nav-link {{ request()->routeIs($item['route']) ? 'is-active' : '' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}" class="btn-primary hidden sm:inline-flex">
                    Schedule a Consultation
                </a>

                <button type="button"
                        data-mobile-toggle
                        class="relative z-10 inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/20 bg-white/10 text-white backdrop-blur-sm lg:hidden"
                        aria-label="Open menu">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<div data-mobile-menu class="mobile-menu fixed inset-0 z-[60] flex lg:hidden" aria-hidden="true">
    <div class="absolute inset-0 bg-navy/60 backdrop-blur-sm" data-mobile-close></div>
    <div class="relative ml-auto flex h-full w-full max-w-sm flex-col bg-white shadow-2xl">
        <div class="flex items-center justify-between border-b border-soft-gray p-5">
            <img src="{{ asset('images/logo/logo-light.png') }}" alt="ClaimScript LLC" class="h-9 w-auto">
            <button type="button" data-mobile-close class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-charcoal hover:bg-off-white" aria-label="Close menu">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>
        </div>
        <nav class="flex flex-1 flex-col gap-1 p-5" aria-label="Mobile navigation">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   data-mobile-link
                   class="rounded-xl px-4 py-3 text-base font-medium {{ request()->routeIs($item['route']) ? 'bg-off-white text-navy' : 'text-charcoal hover:bg-off-white' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="border-t border-soft-gray p-5">
            <a href="{{ route('contact') }}" data-mobile-link class="btn-primary w-full">Schedule a Consultation</a>
        </div>
    </div>
</div>
