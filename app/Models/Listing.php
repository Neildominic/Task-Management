<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'is_published'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    public function userHasListing() {
        return$this->hasMany(UserHasListing::class, 'listing_id', 'id');
    }
}
