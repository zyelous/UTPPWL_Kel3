<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showForUser');
    }

    public function index()
    {
        $films = Film::with('genre')->get();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string',
            'year'     => 'required|integer',
            'rating'   => 'required|numeric',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Film::create($data);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title'    => 'required|string',
            'year'     => 'required|integer',
            'rating'   => 'required|numeric',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            if (!empty($film->poster) && Storage::exists('public/' . $film->poster)) {
                Storage::delete('public/' . $film->poster);
            }

            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film->update($data);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Film $film)
    {
        
        if (!empty($film->poster) && Storage::exists('public/' . $film->poster)) {
            Storage::delete('public/' . $film->poster);
        }

        $film->delete();
        return back()->with('success', 'Film dihapus!');
    }

   
    public function showForUser()
    {
        $films = Film::with('genre')->get();
        return view('user.home', compact('films'));
    }
}
