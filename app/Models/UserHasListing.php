<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'listing_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
