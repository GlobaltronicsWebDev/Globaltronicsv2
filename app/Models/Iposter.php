<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Iposter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'mall_or_location',
        'image',
        'gallery_images',
        'short_description',
        'features',
        'specifications',
        'daily_traffic',
        'cta_label',
        'cta_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'gallery_images' => 'array',
    ];

    /**
     * Resolves an array of full URLs for the gallery images
     */
    public function getGalleryListAttribute(): array
    {
        $gallery = $this->gallery_images;
        if (is_string($gallery)) {
            $gallery = json_decode($gallery, true);
        }

        if (!is_array($gallery) || empty($gallery)) {
            return [$this->image_url];
        }

        return array_map(function ($img) {
            if (Str::startsWith($img, ['http://', 'https://'])) {
                return $img;
            }
            return asset($img);
        }, $gallery);
    }

    /**
     * Boot function to auto-generate slugs from titles
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($iposter) {
            if (empty($iposter->slug)) {
                $baseSlug = Str::slug($iposter->title);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$baseSlug}-{$counter}";
                    $counter++;
                }
                $iposter->slug = $slug;
            }
        });
    }

    /**
     * Resolves the full URL to the display image
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/iposters/iposter_hero.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, 'uploads/')) {
            return asset($this->image);
        }

        return asset($this->image);
    }

    /**
     * Returns the public show URL for this iPoster location
     */
    public function getReadUrlAttribute(): string
    {
        return route('services.iposters.show', $this->slug);
    }

    /**
     * Pre-filled mailto or custom booking link
     */
    public function getBookingUrlAttribute(): string
    {
        if (!empty($this->cta_url)) {
            return $this->cta_url;
        }

        $subject = rawurlencode("Advertising Slot Booking Inquiry - Digital iPoster: " . $this->title);
        $body = rawurlencode("Hello Globaltronics Sales & Accounts Team,\n\nI am interested in booking an advertising campaign slot on your Digital iPoster display at " . $this->title . " (" . ($this->mall_or_location ?: 'Premier Mall') . ").\n\nPlease send me your current rate card, loop availability, and technical delivery requirements.\n\nThank you!\n\nName:\nCompany:\nContact Number:\nTarget Campaign Date:");

        return "mailto:info@globaltronics.net?subject={$subject}&body={$body}";
    }
}
