<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'rating',
        'synopsis',
        'poster',
        'genre_id',
        'user_id',
        'poster',
        'is_featured',
        'release_date',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function setSynopsisAttribute($value)
    {
        $this->attributes['synopsis'] = $value
            ? Crypt::encryptString($value)
            : null;
    }

    public function getSynopsisAttribute($value)
    {
        if (!$value) {
            return '-';
        }

        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return '[Sinopsis tidak dapat dibaca]';
        }
    }

    public function getPosterUrlAttribute()
    {
        if ($this->poster && Storage::disk('public')->exists($this->poster)) {
            return asset('storage/' . $this->poster);
        } elseif ($this->poster && filter_var($this->poster, FILTER_VALIDATE_URL)) {
            return $this->poster;
        }

        return asset('images/default-poster.jpg'); 
    }
}
