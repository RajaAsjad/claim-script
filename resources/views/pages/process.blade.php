@extends('layouts.app')

@section('title', 'Our Process | ClaimScript LLC')
@section('meta_description', 'Learn how ClaimScript manages the revenue cycle with structured processes from eligibility verification through reporting and analytics.')

@section('content')
    <section class="bg-navy pt-28 pb-16 md:pt-36 md:pb-20">
        <div class="container-site">
            <div class="reveal max-w-3xl">
                <p class="section-label">Our Process</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white md:text-5xl">
                    Structured. Transparent. Accountable.
                </h1>
                <p class="mt-5 text-base leading-relaxed text-white/75 md:text-lg">
                    Every step of your revenue cycle follows a defined process so you always know what happens next and where your revenue stands.
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="relative mx-auto max-w-4xl">
                <div class="absolute left-6 top-0 hidden h-full w-0.5 process-line md:left-1/2 md:block md:-translate-x-px" aria-hidden="true"></div>

                @foreach ([
                    ['Eligibility & Authorization', 'Before treatment begins, we verify insurance coverage, confirm benefits, and manage prior authorizations. For therapy practices, we track visit limits and support authorization renewals to prevent denials upfront.', '01'],
                    ['Charge Capture & Coding', 'We review charges against clinical documentation, verify coding accuracy, and ensure claims are formatted correctly for each payer before submission.', '02'],
                    ['Claim Submission', 'Claims are submitted promptly with payer-specific requirements met. We monitor for rejections and resolve them before they become delays.', '03'],
                    ['Payment Posting', 'Payments, adjustments, and patient responsibility are posted accurately and reconciled against expected reimbursement.', '04'],
                    ['Denial Management', 'Denied claims are identified quickly, analyzed for root cause, and resolved through corrections or structured appeals.', '05'],
                    ['Patient Billing', 'Patient balances are communicated clearly through compliant statements and balanced follow-up workflows.', '06'],
                    ['Reporting & Review', 'Regular performance summaries, denial trends, and benchmark-oriented insights keep you informed and empowered to act.', '07'],
                ] as $i => $step)
                    <div class="reveal stagger-{{ ($i % 6) + 1 }} relative mb-12 flex flex-col gap-6 md:mb-16 {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                        <div class="hidden w-1/2 md:block"></div>
                        <div class="relative z-10 w-full md:w-1/2">
                            <div class="card !border-l-4 !border-l-logo-blue">
                                <span class="text-xs font-bold text-logo-blue">Step {{ $step[2] }}</span>
                                <h2 class="mt-2 text-xl font-bold text-navy">{{ $step[0] }}</h2>
                                <p class="mt-3 text-sm leading-relaxed text-muted">{{ $step[1] }}</p>
                            </div>
                        </div>
                        <div class="absolute left-6 top-8 hidden h-4 w-4 -translate-x-1/2 rounded-full border-4 border-white bg-logo-blue shadow-md md:left-1/2 md:block" aria-hidden="true"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding bg-off-white">
        <div class="container-site">
            <div class="grid gap-8 md:grid-cols-3">
                @foreach ([
                    ['Onboarding', 'We learn your practice, EHR workflow, payer mix, and billing priorities to build a tailored operations plan.'],
                    ['Ongoing Operations', 'Dedicated account support with proactive communication, structured workflows, and regular performance reviews.'],
                    ['Continuous Improvement', 'We refine processes based on denial trends, payer changes, and your practice\'s evolving needs.'],
                ] as $i => $phase)
                    <div class="card reveal stagger-{{ $i + 1 }} text-center">
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-navy text-sm font-bold text-white">{{ $i + 1 }}</div>
                        <h3 class="text-lg font-bold text-navy">{{ $phase[0] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $phase[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-banner')
@endsection
