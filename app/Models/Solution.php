<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Solution extends Model
{
    use HasFactory;

    protected $table = 'solutions';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'image',
        'short_description',
        'features',
        'specs',
        'location',
        'cta_label',
        'cta_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Auto-generate slug on saving.
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
     * Public full description page URL.
     */
    public function getReadUrlAttribute(): string
    {
        return route('solutions.show', $this->slug ?: $this->id);
    }

    /**
     * Formatted image URL accessor.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/ref_proj/Reference-Projects-LED-Installation-1.webp');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset($this->image);
    }

    /**
     * Booking CTA URL.
     */
    public function getBookingUrlAttribute(): string
    {
        if (!empty($this->cta_url)) {
            return $this->cta_url;
        }

        $subject = rawurlencode("Ad Booking Inquiry: " . $this->title);
        $body = rawurlencode("Hello Globaltronics Sales Team,\n\nI am interested in booking an ad slot or inquiring about the " . $this->title . " LED Display System.\n\nPlease provide available packages, rate cards, and technical specs.\n\nThank you!\n\nName:\nCompany:\nContact Number:");

        return "mailto:inquiry@globaltronics.net?subject={$subject}&body={$body}";
    }
}
