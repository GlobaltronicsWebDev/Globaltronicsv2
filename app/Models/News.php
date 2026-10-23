<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'badge',
        'published_date',
        'description',
        'content',
        'image',
        'video_url',
        'link_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'published_date' => 'date',
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
                $slug = Str::slug($model->title);
                if (empty($slug)) {
                    $slug = 'news-article-' . ($model->id ?: uniqid());
                }
                $model->slug = $slug;
            }
        });
    }

    /**
     * Get the accessible full image URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/news/news1.jpg');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset($this->image);
    }

    /**
     * Format the published date for display (e.g. July 31, 2026).
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_date) {
            return date('F d, Y');
        }

        return Carbon::parse($this->published_date)->format('F d, Y');
    }

    /**
     * Get the dedicated reading page URL for this article.
     */
    public function getReadUrlAttribute(): string
    {
        if (!empty($this->link_url) && $this->link_url !== '#news') {
            return $this->link_url;
        }

        return route('news.show', $this->slug ?: $this->id);
    }

    /**
     * Extract the standard 11-character YouTube video ID.
     */
    public function getYoutubeIdAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        $url = trim($this->video_url);

        // If user pasted an iframe embed code, extract the src URL first
        if (preg_match('/<iframe.*?src=["\'](.*?)["\']/i', $url, $iframeMatch)) {
            $url = $iframeMatch[1];
        }

        // Match watch?v=, live/, shorts/, embed/, v/, youtu.be/, etc.
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/|youtube\.com\/(?:shorts|live)\/)([a-zA-Z0-9_-]{11})/i';

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        // If user provided raw 11-char ID directly
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
            return $url;
        }

        return null;
    }

    /**
     * Extract the standard embed URL for YouTube videos.
     */
    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;
        if (!$id) {
            return null;
        }

        return 'https://www.youtube.com/embed/' . $id . '?rel=0&modestbranding=1';
    }

    /**
     * Check if article has a valid YouTube video.
     */
    public function getHasVideoAttribute(): bool
    {
        return !empty($this->youtube_id);
    }
}
