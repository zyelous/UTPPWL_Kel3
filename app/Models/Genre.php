<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genre extends Model
{
    protected $fillable = ['name'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($genre) => $genre->id = (string) Str::uuid());
    }

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}

