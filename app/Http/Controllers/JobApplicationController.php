<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class JobApplicationController extends Controller
{
    /**
     * Store a newly submitted job application.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'career_id' => ['nullable', 'exists:careers,id'],
            'job_title' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_number' => ['required', 'string', 'max:50'],
            'current_address' => ['nullable', 'string', 'max:500'],
            'why_hire_you' => ['nullable', 'string', 'max:2000'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_' . Str::slug($validated['full_name']) . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/resumes');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $filename);
            $resumePath = 'uploads/resumes/' . $filename;
        }

        $application = JobApplication::create([
            'career_id' => $validated['career_id'] ?? null,
            'job_title' => $validated['job_title'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'current_address' => $validated['current_address'] ?? null,
            'why_hire_you' => $validated['why_hire_you'] ?? null,
            'resume_path' => $resumePath,
            'status' => 'new',
        ]);

        // Send Email Notification to HR Specialist
        try {
            $hrRecipient = 'hr.specialist@globaltronics.net';
            $mailSubject = "New Job Application: " . $validated['job_title'] . " - " . $validated['full_name'];
            $mailBody = "New Job Application Received on Globaltronics Portal:\n\n"
                . "Role Applied: " . $validated['job_title'] . "\n"
                . "Applicant Name: " . $validated['full_name'] . "\n"
                . "Email: " . $validated['email'] . "\n"
                . "Contact Number: " . $validated['contact_number'] . "\n"
                . "Current Address: " . ($validated['current_address'] ?: 'Not specified') . "\n\n"
                . "Why should we hire you?:\n" . ($validated['why_hire_you'] ?: 'None provided') . "\n\n"
                . ($resumePath ? "Resume Attachment: " . url($resumePath) . "\n\n" : "")
                . "Manage this application in Admin CMS:\n" . route('admin.applications.index');

            \Illuminate\Support\Facades\Mail::raw($mailBody, function ($message) use ($hrRecipient, $mailSubject, $validated) {
                $message->to($hrRecipient)
                        ->replyTo($validated['email'], $validated['full_name'])
                        ->subject($mailSubject);
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning("Could not dispatch HR application notification email: " . $e->getMessage());
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your application for ' . $validated['job_title'] . ' has been submitted successfully! Our hiring team will review it within 3-5 business days.',
                'application' => $application,
            ]);
        }

        return redirect()->back()->with('success', 'Your application for ' . $validated['job_title'] . ' has been submitted successfully!');
    }
}
