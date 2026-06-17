@extends('layouts.app')

@section('title', 'Contact | ClaimScript LLC')
@section('meta_description', 'Schedule a consultation with ClaimScript LLC. Secure practice inquiry form for outpatient healthcare providers seeking billing and revenue cycle management support.')

@section('content')
    <section class="bg-navy pt-28 pb-16 md:pt-36 md:pb-20">
        <div class="container-site">
            <div class="reveal max-w-3xl">
                <p class="section-label">Contact</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white md:text-5xl">
                    Schedule a Consultation
                </h1>
                <p class="mt-5 text-base leading-relaxed text-white/75 md:text-lg">
                    Tell us about your practice and billing needs. We'll respond promptly to schedule a consultation and discuss how ClaimScript can support your revenue cycle.
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-site">
            <div class="grid gap-12 lg:grid-cols-5">
                <div class="reveal lg:col-span-3">
                    <div class="rounded-3xl border border-soft-gray bg-off-white p-6 md:p-8">
                        <h2 class="text-xl font-bold text-navy">Request a consultation</h2>
                        <p class="mt-2 text-sm text-muted">Fields marked with * are required.</p>
                        <div class="mt-6">
                            @include('partials.contact-form')
                        </div>
                    </div>
                </div>

                <div class="reveal stagger-2 lg:col-span-2">
                    <div class="space-y-6">
                        <div class="card">
                            <h3 class="font-bold text-navy">What to expect</h3>
                            <ul class="mt-4 space-y-3 text-sm text-muted">
                                <li class="flex gap-2">
                                    <span class="font-bold text-logo-blue">1.</span>
                                    Submit your inquiry through this secure form
                                </li>
                                <li class="flex gap-2">
                                    <span class="font-bold text-logo-blue">2.</span>
                                    We'll review your practice needs and respond promptly
                                </li>
                                <li class="flex gap-2">
                                    <span class="font-bold text-logo-blue">3.</span>
                                    Schedule a consultation to discuss your revenue cycle
                                </li>
                            </ul>
                        </div>

                        <div class="card">
                            <h3 class="font-bold text-navy">Contact information</h3>
                            <div class="mt-4 space-y-3 text-sm">
                                <p>
                                    <span class="font-medium text-charcoal">Email</span><br>
                                    <a href="mailto:info@claimscript.com" class="text-logo-blue-dark hover:underline">info@claimscript.com</a>
                                </p>
                                <p>
                                    <span class="font-medium text-charcoal">Website</span><br>
                                    ClaimScript.com
                                </p>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-logo-blue/20 bg-logo-blue/5 p-6">
                            <div class="flex gap-3">
                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-logo-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                                <div>
                                    <h3 class="text-sm font-bold text-navy">Privacy notice</h3>
                                    <p class="mt-1 text-xs leading-relaxed text-muted">
                                        This form is for practice inquiries only. Please do not submit protected health information (PHI). ClaimScript follows HIPAA-focused security practices for all operational data.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
