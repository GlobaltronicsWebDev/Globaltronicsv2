<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service_type',
        'project_location',
        'estimated_size',
        'budget_range',
        'timeline',
        'message',
        'status',
        'admin_notes',
        'ip_address',
    ];

    /**
     * Human-readable formatted creation date.
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at ? $this->created_at->format('M d, Y · h:i A') : 'N/A';
    }

    /**
     * Relative time (e.g. '2 hours ago').
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at ? $this->created_at->diffForHumans() : 'N/A';
    }

    /**
     * Tailwind badge class based on status.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'new' => 'bg-amber-100 text-amber-800 border-amber-300',
            'contacted' => 'bg-blue-100 text-blue-800 border-blue-300',
            'quoted' => 'bg-purple-100 text-purple-800 border-purple-300',
            'closed' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            default => 'bg-slate-100 text-slate-800 border-slate-300',
        };
    }
}
