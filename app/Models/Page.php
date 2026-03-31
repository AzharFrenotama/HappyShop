<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'description',
        'content',
        'image',
        'image_alt',
        'phone',
        'email',
        'address',
        'hours',
        'meta_data',
    ];

    protected $casts = [
        'meta_data' => 'array',
    ];

    /**
     * Get page by slug
     */
    public static function getBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get image URL for display
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    /**
     * Get image URL for Filament display
     * Returns the stored path (not full URL) so Filament can display it properly
     */
    public function getImageUrlForFilamentAttribute(): ?string
    {
        return $this->image;
    }
}
