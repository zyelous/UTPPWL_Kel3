<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = ['Action','Comedy','Drama','Horror','Sci-Fi','Romance'];
        foreach ($genres as $g) {
            Genre::create(['name' => $g]);
        }
    }
}
