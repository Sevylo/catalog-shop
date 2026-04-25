<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'long_description',
        'price',
        'sale_price',
        'stock',
        'image',
        'gallery',
        'unit',
        'sku',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'sale_price'  => 'decimal:2',
        'gallery'     => 'array',
        'is_active'   => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    // Helpers
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/product-placeholder.svg');
    }

    public function getEffectivePriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    public function isOnSale(): bool
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedEffectivePriceAttribute(): string
    {
        return 'Rp ' . number_format($this->effective_price, 0, ',', '.');
    }

    public function isAvailable(): bool
    {
        return $this->is_active && $this->stock > 0;
    }

    public function getStockStatusAttribute(): string
    {
        if ($this->stock <= 0) return 'Habis';
        if ($this->stock <= 5) return 'Hampir Habis';
        return 'Tersedia';
    }

    public function getStockStatusColorAttribute(): string
    {
        if ($this->stock <= 0) return 'red';
        if ($this->stock <= 5) return 'yellow';
        return 'green';
    }
}
