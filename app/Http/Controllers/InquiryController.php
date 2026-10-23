<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    /**
     * Handle incoming quote request or project inquiry.
     */
    public function store(Request $request): JsonResponse
    {
        // Anti-spam honeypot: bots will fill this invisible field
        if (!empty($request->input('website_hp'))) {
            return response()->json([
                'success' => true,
                'message' => 'Your inquiry has been submitted successfully.',
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:150'],
            'service_type' => ['required', 'string', 'max:100'],
            'project_location' => ['nullable', 'string', 'max:150'],
            'estimated_size' => ['nullable', 'string', 'max:150'],
            'budget_range' => ['nullable', 'string', 'max:100'],
            'timeline' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'privacy_consent' => ['accepted'],
        ], [
            'name.required' => 'Please provide your full name.',
            'email.required' => 'Please provide a valid email address.',
            'email.email' => 'Please enter a valid email address format.',
            'phone.required' => 'Please provide a contact or mobile number.',
            'service_type.required' => 'Please select the service or display solution you are inquiring about.',
            'message.required' => 'Please describe your project requirements or questions.',
            'message.min' => 'Please provide a few more details about your project (at least 10 characters).',
            'privacy_consent.accepted' => 'You must agree to the Data Privacy terms to submit your inquiry.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please review and complete all required fields.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $inquiry = Inquiry::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'service_type' => $request->input('service_type'),
            'project_location' => $request->input('project_location'),
            'estimated_size' => $request->input('estimated_size'),
            'budget_range' => $request->input('budget_range'),
            'timeline' => $request->input('timeline'),
            'message' => $request->input('message'),
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your quote request has been received. Our sales engineering team will review your specifications and get in touch within 24 business hours.',
            'inquiry_id' => $inquiry->id,
        ], 200);
    }
}
