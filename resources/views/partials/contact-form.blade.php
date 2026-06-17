@if (session('success'))
    <div class="mb-6 rounded-xl border border-logo-blue/30 bg-logo-blue/10 px-4 py-3 text-sm font-medium text-navy" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
        <p class="font-medium">Please correct the following:</p>
        <ul class="mt-2 list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
    @csrf

    <div class="hidden" aria-hidden="true">
        <label for="website">Website</label>
        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="name" class="form-label">Full Name <span class="text-logo-blue">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-input" placeholder="Your name">
        </div>
        <div>
            <label for="email" class="form-label">Email <span class="text-logo-blue">*</span></label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-input" placeholder="you@practice.com">
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-input" placeholder="(555) 000-0000">
        </div>
        <div>
            <label for="practice_name" class="form-label">Practice Name</label>
            <input type="text" name="practice_name" id="practice_name" value="{{ old('practice_name') }}" class="form-input" placeholder="Your practice">
        </div>
    </div>

    <div>
        <label for="practice_type" class="form-label">Practice Type</label>
        <select name="practice_type" id="practice_type" class="form-input">
            <option value="">Select practice type</option>
            @foreach (['Physical Therapy', 'Pain Management', 'Outpatient Specialty', 'Independent Medical Group', 'Other Outpatient Practice'] as $type)
                <option value="{{ $type }}" @selected(old('practice_type') === $type)>{{ $type }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="message" class="form-label">How can we help?</label>
        <textarea name="message" id="message" rows="4" class="form-input resize-none" placeholder="Tell us about your billing needs, current challenges, or questions. Please do not include patient health information.">{{ old('message') }}</textarea>
        <p class="mt-2 text-xs text-muted">This form is for practice inquiries only. Do not submit protected health information (PHI).</p>
    </div>

    <button type="submit" class="btn-primary w-full sm:w-auto">
        Schedule a Consultation
    </button>
</form>
