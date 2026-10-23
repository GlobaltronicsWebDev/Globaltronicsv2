<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'title',
        'slug',
        'department',
        'employment_type',
        'location',
        'experience_level',
        'salary_range',
        'description',
        'responsibilities',
        'requirements',
        'benefits',
        'application_email',
        'application_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Boot model events to auto-generate slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    /**
     * Get public details page URL.
     */
    public function getReadUrlAttribute(): string
    {
        return route('careers.show', $this->slug ?: $this->id);
    }

    /**
     * Generate mailto application link with prefilled subject.
     */
    public function getMailtoLinkAttribute(): string
    {
        $email = $this->application_email ?: 'hr.specialist@globaltronics.net';
        $subject = rawurlencode("Job Application: " . $this->title);
        $body = rawurlencode("Dear Globaltronics Hiring Team,\n\nI am writing to express my interest in the " . $this->title . " (" . $this->department . ") position.\n\nPlease find my resume and qualifications attached.\n\nThank you!\n\nBest regards,\n[Your Name]\n[Your Contact Number]");

        return "mailto:{$email}?subject={$subject}&body={$body}";
    }
}
