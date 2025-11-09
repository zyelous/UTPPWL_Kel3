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
            ['title'=>'Doctor Strange in the Multiverse of Madness','year'=>2022,'rating'=>9.2,'genre'=>'Action'],
            ['title'=>'Pirates of the Caribbean: Dead Men Tell No Tales','year'=>2017,'rating'=>9.8,'genre'=>'Adventure'],
            ['title'=>'Hansel and Gretel: Witch Hunters','year'=>2013,'rating'=>9.0,'genre'=>'Fantasy'],
            ['title'=>'Divergent','year'=>2014,'rating'=>9.6,'genre'=>'Sci-Fi'],
            ['title'=>'Now You See Me 2','year'=>2016,'rating'=>9.7,'genre'=>'Thriller'],
            ['title'=>'F1:The Movie','year'=>2024,'rating'=>9.2,'genre'=>'Sports'], 
            ['title'=>'Final Destination: Bloodlines','year'=>2025,'rating'=>9.2,'genre'=>'Horror'],
            ['title'=>'28 Years Later','year'=>2025,'rating'=>8.2,'genre'=>'Horror'],
            ['title'=>'Insidious: The Red Door','year'=>2010,'rating'=>8.0,'genre'=>'Horror'],
            ['title'=>'The Conjuring: Last Rites','year'=>2025,'rating'=>8.9,'genre'=>'Horror']
        ];

        foreach ($films as $f) {
            $genre = Genre::where('name',$f['genre'])->first();
            if ($genre) {
                Film::create([
                    'title' => ($f['title']),
                    'year' => $f['year'],
                    'rating' => $f['rating'],
                    'genre_id' => $genre->id,
                    'user_id' => 1, 
                ]);
            }
        }
    }
}
