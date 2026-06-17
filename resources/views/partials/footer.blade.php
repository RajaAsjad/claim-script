<footer class="site-footer">
    <div class="container-site pt-12 pb-8 md:pt-16 md:pb-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-12 lg:gap-8">
            <div class="lg:col-span-5">
                <img src="{{ asset('images/logo/logo-dark.png') }}" alt="ClaimScript LLC" class="mb-5 h-24 w-auto md:h-28">
                <p class="max-w-md text-sm leading-relaxed text-white/65">
                    Medical billing and revenue cycle management for outpatient healthcare providers. Transparent processes, dedicated support, and structured reporting.
                </p>
            </div>

            <div class="lg:col-span-3 lg:pl-4">
                <h3 class="footer-heading">Navigation</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ site_page_url('home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ site_page_url('services') }}" class="footer-link">Services</a></li>
                    <li><a href="{{ site_page_url('process') }}" class="footer-link">Our Process</a></li>
                    <li><a href="{{ site_page_url('about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ site_page_url('faq') }}" class="footer-link">FAQ</a></li>
                    <li><a href="{{ site_page_url('contact') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <div class="lg:col-span-4">
                <h3 class="footer-heading">Contact</h3>
                <ul class="space-y-2.5 text-sm text-white/65">
                    <li>
                        <a href="mailto:info@claimscript.com" class="footer-link">info@claimscript.com</a>
                    </li>
                </ul>
                <a href="{{ site_page_url('contact') }}" class="btn-footer mt-6 inline-flex">
                    Schedule a Consultation
                </a>
            </div>
        </div>

        <div class="mt-10 border-t border-white/10 pt-6 text-center text-xs text-white/45">
            <p>&copy; {{ date('Y') }} ClaimScript LLC. All rights reserved.</p>
        </div>
    </div>
</footer>
