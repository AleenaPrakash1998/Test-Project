<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'quantity',
        'in_stock',
        'weight',
        'user_id',
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners')
            ->singleFile();
    }

    public function getBannerUrl(): string
    {
        return $this->getFirstMediaUrl('banners');
    }

}
