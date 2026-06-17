@extends('layouts.app')

@section('title', 'ClaimScript LLC | Every Claim, On the Right Script')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-navy pt-28 pb-20 md:pt-36 md:pb-28">
        <canvas id="hero-canvas" class="hero-canvas" aria-hidden="true"></canvas>
        <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy-light/80 to-navy" aria-hidden="true"></div>
        <div class="absolute -right-32 top-20 h-96 w-96 rounded-full bg-logo-blue/10 blur-3xl" aria-hidden="true"></div>

        <div class="container-site relative">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-label">Revenue Cycle Management Platform</p>
                    <h1 class="mt-4 text-4xl font-extrabold leading-[1.1] tracking-tight text-white md:text-5xl lg:text-6xl">
                        Every claim,<br>
                        <span class="text-logo-blue">on the right script.</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-base leading-relaxed text-white/75 md:text-lg">
                        ClaimScript helps outpatient practices manage the entire revenue cycle from accurate claim submission to proactive denial resolution with full transparency and structured reporting.
                    </p>
                    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ route('contact') }}" class="btn-primary">Schedule a Consultation</a>
                        <a href="{{ route('services') }}" class="btn-secondary">Explore Services</a>
                    </div>
                </div>

                <div class="reveal stagger-2">
                    <div class="dashboard-panel">
                        <div class="border-b border-soft-gray bg-off-white px-5 py-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Revenue Visibility</p>
                                    <p class="mt-1 text-sm font-semibold text-navy">Performance Benchmarks</p>
                                </div>
                                <span class="rounded-full bg-logo-blue/15 px-3 py-1 text-xs font-semibold text-logo-blue-dark">Live View</span>
                            </div>
                        </div>
                        <div class="relative p-5 md:p-6">
                            <canvas id="dashboard-canvas" class="absolute inset-0 h-full w-full opacity-60" aria-hidden="true"></canvas>
                            <div class="relative grid grid-cols-3 gap-3">
                                @foreach ([['Claims', 'Structured'], ['Denials', 'Proactive'], ['Collections', 'Optimized']] as $i => $metric)
                                    <div class="rounded-xl border border-soft-gray bg-white/90 p-4 text-center backdrop-blur-sm">
                                        <p class="text-xs text-muted">{{ $metric[0] }}</p>
                                        <p class="mt-1 text-sm font-bold text-navy">{{ $metric[1] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="relative mt-5 flex h-32 items-end gap-2">
                                @foreach ([65, 78, 55, 88, 72, 95, 68] as $i => $h)
                                    <div class="dashboard-bar flex-1 rounded-t-lg bg-gradient-to-t from-logo-blue/20 to-logo-blue"
                                         style="height: {{ $h }}%; animation-delay: {{ $i * 0.1 }}s"></div>
                                @endforeach
                            </div>
                            <p class="relative mt-4 text-center text-xs text-muted">Capability-focused reporting. Not fabricated performance claims.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why ClaimScript --}}
    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="reveal mx-auto max-w-3xl text-center">
                <p class="section-label">Why ClaimScript</p>
                <h2 class="section-title">Built for practices that expect clarity, not confusion</h2>
                <p class="section-subtitle mx-auto">
                    We combine structured billing operations with proactive communication so you always understand where your revenue stands and what happens next.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Transparency', 'Clear reporting, open communication, and full visibility into your revenue cycle at every stage.'],
                    ['Dedicated Support', 'A responsive account team focused on your practice, not a ticket queue.'],
                    ['Proactive Denial Management', 'We identify and resolve issues before they become costly delays.'],
                    ['Revenue Optimization', 'Structured workflows designed to improve collections and protect cash flow.'],
                    ['EHR Integration', 'Seamless alignment with your existing clinical and billing workflows.'],
                    ['Long-Term Partnership', 'We invest in understanding your practice and growing with you over time.'],
                ] as $i => $item)
                    <div class="card reveal stagger-{{ ($i % 6) + 1 }}">
                        <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-logo-blue/10">
                            <svg class="h-5 w-5 text-logo-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-navy">{{ $item[0] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $item[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Revenue Cycle Process --}}
    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-label">Our Process</p>
                    <h2 class="section-title">A structured revenue cycle, end to end</h2>
                    <p class="section-subtitle">
                        From eligibility verification to final payment posting, every step follows a defined process designed for accuracy, accountability, and transparency.
                    </p>
                    <a href="{{ route('process') }}" class="btn-outline mt-8 inline-flex">View Full Process</a>
                </div>

                <div class="reveal stagger-2 space-y-4">
                    @foreach ([
                        ['01', 'Eligibility & Authorization', 'Verify coverage, confirm benefits, and manage prior authorizations before treatment.'],
                        ['02', 'Claim Submission', 'Accurate coding and timely submission aligned with payer requirements.'],
                        ['03', 'Payment Posting', 'Structured reconciliation of payments, adjustments, and patient responsibility.'],
                        ['04', 'Denial Management', 'Proactive identification, appeals, and resolution of denied claims.'],
                        ['05', 'Reporting & Analytics', 'Clear performance visibility with benchmark-oriented insights.'],
                    ] as $step)
                        <div class="flex gap-4 rounded-2xl border border-soft-gray bg-white p-5 transition hover:border-logo-blue/20 hover:shadow-md">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-navy text-sm font-bold text-white">{{ $step[0] }}</span>
                            <div>
                                <h3 class="font-bold text-navy">{{ $step[1] }}</h3>
                                <p class="mt-1 text-sm text-muted">{{ $step[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Core Services --}}
    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="reveal mx-auto max-w-3xl text-center">
                <p class="section-label">Core Services</p>
                <h2 class="section-title">Complete revenue cycle support</h2>
                <p class="section-subtitle mx-auto">
                    Everything your outpatient practice needs to manage billing operations with confidence and control.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Medical Billing & Claim Submission', 'Accurate, timely claim creation and submission across payers.'],
                    ['Revenue Cycle Management', 'End-to-end oversight from patient registration to final collections.'],
                    ['Denial Management & Appeals', 'Structured denial tracking, root-cause analysis, and appeals support.'],
                    ['Patient Billing & Statements', 'Clear patient statements and balanced follow-up workflows.'],
                    ['Revenue Reporting & Analytics', 'Structured reporting with benchmark-oriented performance visibility.'],
                    ['Credentialing & Provider Enrollment', 'Provider enrollment and credentialing support to keep you billing-ready.'],
                    ['Eligibility & Authorization', 'Insurance verification, benefit confirmation, prior auth, and visit-limit tracking.'],
                ] as $i => $service)
                    <div class="card reveal stagger-{{ ($i % 6) + 1 }}">
                        <h3 class="text-base font-bold text-navy">{{ $service[0] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $service[1] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="reveal mt-10 text-center">
                <a href="{{ route('services') }}" class="btn-outline">View All Services</a>
            </div>
        </div>
    </section>

    {{-- Specialty Solutions --}}
    <section class="section-padding bg-navy text-white">
        <div class="container-site">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-label">Specialty Solutions</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">
                        Built for outpatient &amp; physical therapy practices
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-white/70 md:text-lg">
                        Outpatient and therapy practices face unique authorization challenges. ClaimScript provides dedicated eligibility and authorization management, including visit-limit tracking and renewal support, to help prevent denials before treatment occurs.
                    </p>
                </div>

                <div class="reveal stagger-2 grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        'Insurance eligibility verification',
                        'Benefit confirmation',
                        'Prior authorization support',
                        'Visit-limit tracking',
                        'Authorization renewal support',
                        'Denial prevention workflows',
                    ] as $feature)
                        <div class="card-dark flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-logo-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm text-white/85">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Transparency & Reporting --}}
    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal order-2 lg:order-1">
                    <div class="dashboard-panel p-6 md:p-8">
                        <div class="mb-6 flex items-center justify-between">
                            <h3 class="font-bold text-navy">Reporting Dashboard</h3>
                            <span class="text-xs font-medium text-muted">Benchmark View</span>
                        </div>
                        <div class="space-y-4">
                            @foreach ([
                                ['Claim Accuracy', 92],
                                ['Denial Resolution', 85],
                                ['Collection Efficiency', 88],
                                ['Authorization Compliance', 96],
                            ] as $row)
                                <div>
                                    <div class="mb-1 flex justify-between text-sm">
                                        <span class="font-medium text-charcoal">{{ $row[0] }}</span>
                                        <span class="text-muted">Target benchmark</span>
                                    </div>
                                    <div class="h-2 overflow-hidden rounded-full bg-soft-gray">
                                        <div class="h-full rounded-full bg-gradient-to-r from-logo-blue to-logo-blue-dark" style="width: {{ $row[1] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p class="mt-5 text-xs text-muted">Illustrative capability benchmarks. Not historical company performance data.</p>
                    </div>
                </div>

                <div class="reveal stagger-2 order-1 lg:order-2">
                    <p class="section-label">Transparency & Reporting</p>
                    <h2 class="section-title">Visibility you can act on</h2>
                    <p class="section-subtitle">
                        Structured reporting gives you a clear picture of claim status, denial trends, collection performance, and authorization compliance so you can make informed decisions about your practice.
                    </p>
                    <ul class="mt-6 space-y-3">
                        @foreach ([
                            'Regular performance summaries',
                            'Denial trend analysis',
                            'Authorization status tracking',
                            'Open claims visibility',
                            'Benchmark-oriented insights',
                        ] as $point)
                            <li class="flex items-center gap-3 text-sm text-charcoal">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-logo-blue/15 text-logo-blue">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- HIPAA Trust --}}
    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="reveal rounded-3xl border border-soft-gray bg-gradient-to-br from-off-white to-white p-8 md:p-12">
                <div class="grid items-center gap-8 lg:grid-cols-3">
                    <div class="lg:col-span-1">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-navy">
                            <svg class="h-8 w-8 text-logo-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <p class="section-label">Security & Compliance</p>
                        <h2 class="mt-2 text-2xl font-bold text-navy md:text-3xl">HIPAA-focused operations you can trust</h2>
                        <p class="mt-3 text-sm leading-relaxed text-muted md:text-base">
                            ClaimScript is built with healthcare privacy in mind. Our operations follow HIPAA-focused security practices, and our website forms are designed for practice inquiries only. We never request patient health information through this site. Your data and your patients' privacy are treated with the highest care.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Preview --}}
    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="reveal mx-auto max-w-3xl text-center">
                <p class="section-label">FAQ</p>
                <h2 class="section-title">Common provider questions</h2>
            </div>

            <div class="mx-auto mt-12 max-w-3xl space-y-3">
                @foreach ([
                    ['What types of practices does ClaimScript serve?', 'We specialize in outpatient healthcare providers, including physical therapy clinics, pain management practices, specialty outpatient groups, and independent medical groups seeking reliable billing operations.'],
                    ['How is ClaimScript different from other billing companies?', 'We prioritize transparency, proactive communication, dedicated account support, and structured processes. You get full visibility into your revenue cycle. Not a black box.'],
                    ['Do you help with prior authorizations and eligibility?', 'Yes. Patient eligibility and authorization management is a core part of our service, especially for outpatient and therapy practices. We verify coverage, manage authorizations, track visit limits, and support renewals.'],
                ] as $i => $faq)
                    <div class="faq-item reveal stagger-{{ $i + 1 }} rounded-2xl border border-soft-gray bg-white">
                        <button type="button" data-faq-toggle aria-expanded="false" class="flex w-full items-center justify-between gap-4 p-5 text-left">
                            <span class="font-semibold text-navy">{{ $faq[0] }}</span>
                            <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-off-white text-navy transition-transform duration-300">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
                            </span>
                        </button>
                        <div class="faq-answer px-5">
                            <p class="pb-5 text-sm leading-relaxed text-muted">{{ $faq[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="reveal mt-8 text-center">
                <a href="{{ route('faq') }}" class="btn-outline">View All FAQs</a>
            </div>
        </div>
    </section>

    @include('partials.cta-banner')
@endsection
