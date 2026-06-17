<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Consultation;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you. Your consultation request has been received.');
        }

        Consultation::create($request->validated());

        return back()->with('success', 'Thank you. Your consultation request has been received. We will respond promptly.');
    }
}
