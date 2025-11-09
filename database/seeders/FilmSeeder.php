<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\Crypt;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            ['title'=>'Inception','year'=>2010,'rating'=>8.8,'genre'=>'Sci-Fi'],
            ['title'=>'The Dark Knight','year'=>2008,'rating'=>9.0,'genre'=>'Action'],
            ['title'=>'Titanic','year'=>1997,'rating'=>7.9,'genre'=>'Romance'],
            ['title'=>'Harry Potter and the Sorcerers Stone','year'=>2001,'rating'=>7.6,'genre'=>'Adventure'],
        ];

        foreach ($films as $f) {
            $genre = Genre::where('name',$f['genre'])->first();
            if ($genre) {
                Film::create([
                    'title' => ($f['title']),
                    'year' => $f['year'],
                    'rating' => $f['rating'],
                    'genre_id' => $genre->id,
                    'user_id' => 1, // admin user created by seeder
                ]);
            }
        }
    }
}
