<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
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
        'gallery_id',
    ];

    // Eloquent relationship for gallery
    // A photo belongs to 1 gallery
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
