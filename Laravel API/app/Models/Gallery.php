<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
        'photographer_id',
    ];

    // Eloquent relationship for photographer
    // A gallery belongs to 1 photographer
    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }

    // Eloquent relationship for photos
    // A gallery has many photos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
