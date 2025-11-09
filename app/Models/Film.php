<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'rating',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor untuk menampilkan URL poster lengkap.
     * Contoh: {{ $film->poster_url }}
     */
    public function getPosterUrlAttribute()
    {
        if ($this->poster && Storage::disk('public')->exists($this->poster)) {
            // Jika gambar tersimpan di storage/public
            return asset('storage/' . $this->poster);
        } elseif ($this->poster && filter_var($this->poster, FILTER_VALIDATE_URL)) {
            // Jika sudah berupa URL (misal dari link eksternal)
            return $this->poster;
        }

        // Jika tidak ada gambar
        return asset('images/default-poster.jpg'); // optional: buat default poster
    }
}
