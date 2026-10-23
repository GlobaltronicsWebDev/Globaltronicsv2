<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'career_id',
        'job_title',
        'full_name',
        'email',
        'contact_number',
        'current_address',
        'why_hire_you',
        'resume_path',
        'status',
    ];

    /**
     * The career opening this application belongs to (if still exists).
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class, 'career_id');
    }

    /**
     * Get accessible URL for uploaded resume.
     */
    public function getResumeUrlAttribute(): ?string
    {
        if (empty($this->resume_path)) {
            return null;
        }

        return asset($this->resume_path);
    }

    /**
     * Format submission date for display.
     */
    public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('M d, Y h:i A');
    }
}
