<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApplicationController extends Controller
{
    /**
     * Display a listing of submitted job applications.
     */
    public function index(Request $request)
    {
        $totalCount = JobApplication::count();
        $newCount = JobApplication::where('status', 'new')->count();
        $reviewedCount = JobApplication::where('status', 'reviewed')->count();
        $contactedCount = JobApplication::where('status', 'contacted')->count();

        $query = JobApplication::query()->with('career');

        // Search query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('contact_number', 'like', "%{$search}%")
                  ->orWhere('job_title', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $applications = $query->orderByDesc('id')
                              ->paginate(15)
                              ->withQueryString();

        return view('admin.applications.index', compact(
            'applications',
            'totalCount',
            'newCount',
            'reviewedCount',
            'contactedCount'
        ));
    }

    /**
     * Update status of an application.
     */
    public function updateStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:new,reviewed,contacted,rejected'],
        ]);

        $application->update([
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('success', "Application status for '{$application->full_name}' updated to " . ucfirst($validated['status']) . ".");
    }

    /**
     * Delete an application.
     */
    public function destroy(JobApplication $application)
    {
        if ($application->resume_path && File::exists(public_path($application->resume_path))) {
            File::delete(public_path($application->resume_path));
        }

        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}
