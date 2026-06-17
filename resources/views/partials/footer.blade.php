<footer class="bg-navy text-white">
    <div class="container-site section-padding">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <img src="{{ asset('images/logo/logo-dark.png') }}" alt="ClaimScript LLC" class="mb-5 h-10 w-auto">
                <p class="max-w-md text-sm leading-relaxed text-white/70">
                    ClaimScript LLC provides medical billing and revenue cycle management for outpatient healthcare providers — with transparency, structured processes, and dedicated partnership support.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-logo-blue">Navigation</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="{{ route('home') }}" class="transition hover:text-white">Home</a></li>
                    <li><a href="{{ route('services') }}" class="transition hover:text-white">Services</a></li>
                    <li><a href="{{ route('process') }}" class="transition hover:text-white">Our Process</a></li>
                    <li><a href="{{ route('about') }}" class="transition hover:text-white">About</a></li>
                    <li><a href="{{ route('faq') }}" class="transition hover:text-white">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="transition hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-logo-blue">Contact</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li>
                        <a href="mailto:info@claimscript.com" class="transition hover:text-white">info@claimscript.com</a>
                    </li>
                    <li>ClaimScript.com</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn-primary mt-6 inline-flex text-sm">
                    Schedule a Consultation
                </a>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-white/10 pt-8 text-xs text-white/50 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} ClaimScript LLC. All rights reserved.</p>
            <p>HIPAA-focused operations. This site does not collect patient health information.</p>
        </div>
    </div>
</footer>
