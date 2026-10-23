<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of client inquiries and quote requests.
     */
    public function index(Request $request)
    {
        $totalCount = Inquiry::count();
        $newCount = Inquiry::where('status', 'new')->count();
        $contactedCount = Inquiry::where('status', 'contacted')->count();
        $quotedCount = Inquiry::where('status', 'quoted')->count();
        $closedCount = Inquiry::where('status', 'closed')->count();

        $query = Inquiry::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%")
                  ->orWhere('project_location', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $inquiries = $query->orderByDesc('created_at')
                           ->paginate(15)
                           ->withQueryString();

        return view('admin.inquiries.index', compact(
            'inquiries',
            'totalCount',
            'newCount',
            'contactedCount',
            'quotedCount',
            'closedCount'
        ));
    }

    /**
     * Update inquiry status.
     */
    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:new,contacted,quoted,closed'],
        ]);

        $inquiry->update(['status' => $validated['status']]);

        return back()->with('success', 'Inquiry status updated to ' . ucfirst($validated['status']) . '.');
    }

    /**
     * Update internal notes on an inquiry.
     */
    public function updateNotes(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $inquiry->update(['admin_notes' => $validated['admin_notes']]);

        return back()->with('success', 'Inquiry notes saved successfully.');
    }

    /**
     * Delete an inquiry.
     */
    public function destroy(Inquiry $inquiry)
    {
        $name = $inquiry->name;
        $inquiry->delete();

        return back()->with('success', "Inquiry from {$name} has been deleted.");
    }
}
