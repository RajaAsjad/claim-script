@extends('layouts.app')

@section('title', 'About | ClaimScript LLC')
@section('meta_description', 'ClaimScript LLC is a modern revenue cycle management partner for outpatient healthcare providers, built on transparency, structure, and dedicated support.')

@section('content')
    <section class="bg-navy pt-28 pb-16 md:pt-36 md:pb-20">
        <div class="container-site">
            <div class="reveal max-w-3xl">
                <p class="section-label">About ClaimScript</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white md:text-5xl">
                    A modern partner for outpatient revenue cycles
                </h1>
                <p class="mt-5 text-base leading-relaxed text-white/75 md:text-lg">
                    ClaimScript was founded on a simple belief: outpatient practices deserve billing operations that are transparent, structured, and responsive. Not opaque and impersonal.
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal">
                    <h2 class="section-title">What we do</h2>
                    <p class="section-subtitle">
                        ClaimScript provides medical billing and revenue cycle management services for outpatient healthcare providers. We handle the full revenue cycle from eligibility verification and claim submission to denial management, patient billing, and performance reporting.
                    </p>
                    <p class="mt-4 text-sm leading-relaxed text-muted">
                        Our primary outcomes: improved collections, reduced denials, protected cash flow, reduced administrative burden, and complete visibility into the billing process.
                    </p>
                </div>
                <div class="reveal stagger-2">
                    <div class="rounded-3xl bg-off-white p-8 md:p-10">
                        <h3 class="text-lg font-bold text-navy">Who we serve</h3>
                        <ul class="mt-5 space-y-3">
                            @foreach ([
                                'Outpatient healthcare providers',
                                'Physical therapy clinics',
                                'Pain management practices',
                                'Specialty outpatient groups',
                                'Independent medical groups',
                            ] as $audience)
                                <li class="flex items-center gap-3 text-sm text-charcoal">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-logo-blue/15 text-logo-blue">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    {{ $audience }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="reveal mx-auto max-w-3xl text-center">
                <p class="section-label">Our Approach</p>
                <h2 class="section-title">What sets us apart</h2>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Transparency', 'Open reporting and clear communication at every stage.'],
                    ['Proactive Communication', 'We reach out before issues escalate, not after.'],
                    ['Dedicated Support', 'A responsive team focused on your practice.'],
                    ['Structured Processes', 'Defined workflows for accuracy and accountability.'],
                    ['Revenue Optimization', 'Designed to improve collections and protect cash flow.'],
                    ['EHR Integration', 'Aligned with your existing clinical workflows.'],
                    ['Authorization Expertise', 'Eligibility and prior auth support built in.'],
                    ['Partnership Mindset', 'We grow with your practice over the long term.'],
                ] as $i => $value)
                    <div class="card reveal stagger-{{ ($i % 6) + 1 }} text-center">
                        <h3 class="font-bold text-navy">{{ $value[0] }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $value[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="reveal rounded-3xl border border-soft-gray bg-gradient-to-br from-navy to-navy-light p-8 md:p-12">
                <div class="max-w-2xl">
                    <h2 class="text-2xl font-bold text-white md:text-3xl">Built on expertise, not empty promises</h2>
                    <p class="mt-4 text-sm leading-relaxed text-white/70 md:text-base">
                        As a new company, we build credibility through our process, transparency, responsiveness, and service structure. Not fabricated statistics or testimonials. We believe the best way to earn your trust is to show you exactly how we work and deliver on what we promise.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.cta-banner')
@endsection
