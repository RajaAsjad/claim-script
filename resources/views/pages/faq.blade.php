@extends('layouts.app')

@section('title', 'FAQ | ClaimScript LLC')
@section('meta_description', 'Frequently asked questions about ClaimScript medical billing and revenue cycle management services for outpatient healthcare providers.')

@section('content')
    <section class="bg-navy pt-28 pb-16 md:pt-36 md:pb-20">
        <div class="container-site">
            <div class="reveal max-w-3xl">
                <p class="section-label">FAQ</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white md:text-5xl">
                    Common provider questions
                </h1>
                <p class="mt-5 text-base leading-relaxed text-white/75 md:text-lg">
                    Answers to the questions outpatient practices ask most about billing operations, transitions, and what to expect from ClaimScript.
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="mx-auto max-w-3xl space-y-3">
                @foreach ([
                    ['What types of practices does ClaimScript serve?', 'We specialize in outpatient healthcare providers, including physical therapy clinics, pain management practices, specialty outpatient groups, and independent medical groups seeking reliable billing operations.'],
                    ['How is ClaimScript different from other billing companies?', 'We prioritize transparency, proactive communication, dedicated account support, and structured processes. You get full visibility into your revenue cycle. Not a black box. We focus on long-term partnership, not transactional service.'],
                    ['Do you help with prior authorizations and eligibility?', 'Yes. Patient eligibility and authorization management is a core part of our service, especially for outpatient and therapy practices. We verify coverage, confirm benefits, manage prior authorizations, track visit limits, and support renewals to help prevent denials before treatment occurs.'],
                    ['Will ClaimScript integrate with our existing EHR?', 'We work to align with your existing clinical and billing workflows. During onboarding, we review your EHR setup, charge capture process, and payer mix to build an integration plan that minimizes disruption.'],
                    ['How does onboarding work?', 'We start by learning your practice: your providers, payers, workflow, and priorities. From there, we build a tailored operations plan, configure reporting, and transition billing operations with clear communication at every step.'],
                    ['What reporting will I receive?', 'You receive structured performance summaries covering claim status, denial trends, collection performance, and authorization compliance. Our reporting uses benchmark-oriented language. We do not present fabricated historical performance data.'],
                    ['How do you handle denied claims?', 'Denied claims are identified quickly, analyzed for root cause, and resolved through corrections or structured appeals. We also track denial trends to implement preventive workflow adjustments.'],
                    ['Is ClaimScript HIPAA compliant?', 'We operate with HIPAA-focused security practices. Our website forms are designed for practice inquiries only and do not collect patient health information. Protected health information is handled through secure, compliant channels established during onboarding.'],
                    ['How much does ClaimScript cost?', 'Pricing depends on your practice size, payer mix, and service scope. Schedule a consultation and we will review your needs and provide a transparent proposal.'],
                    ['How do I get started?', 'Schedule a consultation through our contact form. We will discuss your practice, current challenges, and how ClaimScript can support your revenue cycle operations.'],
                ] as $i => $faq)
                    <div class="faq-item reveal stagger-{{ ($i % 6) + 1 }} rounded-2xl border border-soft-gray bg-off-white">
                        <button type="button" data-faq-toggle aria-expanded="false" class="flex w-full items-center justify-between gap-4 p-5 text-left">
                            <span class="font-semibold text-navy">{{ $faq[0] }}</span>
                            <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-navy transition-transform duration-300">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
                            </span>
                        </button>
                        <div class="faq-answer px-5">
                            <p class="pb-5 text-sm leading-relaxed text-muted">{{ $faq[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-banner')
@endsection
