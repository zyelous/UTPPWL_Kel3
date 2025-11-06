<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Film extends Model
{
    protected $fillable = ['title', 'year', 'rating', 'genre_id', 'user_id'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($film) => $film->id = (string) Str::uuid());
    }

    public function genre() { return $this->belongsTo(Genre::class); }
    public function user() { return $this->belongsTo(User::class); }
}

