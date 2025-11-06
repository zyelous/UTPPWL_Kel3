<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FilmController extends Controller
{
    public function index() {
        $films = Film::with('genre')->where('user_id', auth()->id())->get();
        return view('films.index', compact('films'));
    }

    public function create() {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'year' => 'required|integer',
            'rating' => 'required|numeric',
            'genre_id' => 'required'
        ]);
        $data['title'] = Crypt::encryptString($data['title']);
        $data['user_id'] = auth()->id();
        Film::create($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function destroy(Film $film) {
        $film->delete();
        return back()->with('success', 'Film dihapus!');
    }
}
