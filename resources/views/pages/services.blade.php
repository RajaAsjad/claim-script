@extends('layouts.app')

@section('title', 'Services | ClaimScript LLC')
@section('meta_description', 'Medical billing, revenue cycle management, denial management, patient billing, credentialing, and eligibility services for outpatient healthcare providers.')

@section('content')
    <section class="bg-navy pt-28 pb-16 md:pt-36 md:pb-20">
        <div class="container-site">
            <div class="reveal max-w-3xl">
                <p class="section-label">Services</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white md:text-5xl">
                    Complete revenue cycle support
                </h1>
                <p class="mt-5 text-base leading-relaxed text-white/75 md:text-lg">
                    From claim submission to denial resolution, ClaimScript provides structured billing operations designed to improve collections, reduce administrative burden, and give you full visibility.
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="grid gap-8">
                @foreach ([
                    [
                        'Medical Billing & Claim Submission',
                        'Accurate claim creation, coding review, and timely submission across commercial and government payers. We align with your clinical documentation and payer requirements to reduce unnecessary rejections.',
                        ['Charge capture review', 'Coding accuracy checks', 'Timely filing compliance', 'Payer-specific formatting'],
                    ],
                    [
                        'Revenue Cycle Management',
                        'End-to-end oversight of your revenue cycle, from patient registration through final payment posting and account resolution.',
                        ['Workflow alignment', 'AR management', 'Payment reconciliation', 'Process accountability'],
                    ],
                    [
                        'Denial Management & Appeals',
                        'Proactive denial identification, root-cause analysis, and structured appeals support to recover revenue and prevent recurring issues.',
                        ['Denial trend tracking', 'Appeals documentation', 'Root-cause reporting', 'Preventive workflow adjustments'],
                    ],
                    [
                        'Patient Billing & Statements',
                        'Clear, compliant patient statements and balanced follow-up workflows that support collections without compromising the patient experience.',
                        ['Statement generation', 'Patient balance follow-up', 'Payment plan support', 'Clear communication'],
                    ],
                    [
                        'Revenue Reporting & Analytics',
                        'Structured reporting with benchmark-oriented insights so you understand performance trends and can make informed decisions.',
                        ['Performance summaries', 'Collection analytics', 'Denial reporting', 'Benchmark comparisons'],
                    ],
                    [
                        'Credentialing & Provider Enrollment',
                        'Support for provider enrollment and credentialing so your practice stays billing-ready across payers and locations.',
                        ['Enrollment tracking', 'Re-credentialing support', 'Payer panel management', 'Documentation coordination'],
                    ],
                    [
                        'Patient Eligibility & Authorization Management',
                        'Especially critical for outpatient and physical therapy practices. We verify coverage, confirm benefits, manage prior authorizations, track visit limits, and support renewals to prevent denials before treatment.',
                        ['Eligibility verification', 'Benefit confirmation', 'Prior authorization support', 'Visit-limit tracking', 'Authorization renewal support'],
                    ],
                ] as $i => $service)
                    <div class="card reveal stagger-{{ ($i % 6) + 1 }} !p-0 overflow-hidden">
                        <div class="grid lg:grid-cols-5">
                            <div class="bg-off-white p-8 lg:col-span-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-logo-blue">Service {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h2 class="mt-3 text-xl font-bold text-navy md:text-2xl">{{ $service[0] }}</h2>
                                <p class="mt-3 text-sm leading-relaxed text-muted">{{ $service[1] }}</p>
                            </div>
                            <div class="flex flex-col justify-center p-8 lg:col-span-3">
                                <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-muted">What's included</p>
                                <ul class="grid gap-3 sm:grid-cols-2">
                                    @foreach ($service[2] as $feature)
                                        <li class="flex items-center gap-2 text-sm text-charcoal">
                                            <svg class="h-4 w-4 shrink-0 text-logo-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M5 13l4 4L19 7"/></svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="reveal rounded-3xl bg-navy p-8 text-center md:p-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl">Not sure which services you need?</h2>
                <p class="mx-auto mt-3 max-w-xl text-sm text-white/70 md:text-base">
                    Schedule a consultation and we'll review your practice workflow, current challenges, and recommend the right level of support.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary mt-6 inline-flex">Schedule a Consultation</a>
            </div>
        </div>
    </section>
@endsection
