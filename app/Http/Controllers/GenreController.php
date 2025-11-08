<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }

    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Genre::create(['name' => $request->name]);
        return redirect()->route('genres.index')->with('success','Genre ditambahkan!');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate(['name' => 'required']);
        $genre->update(['name' => $request->name]);
        return redirect()->route('genres.index')->with('success','Genre diperbarui!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return back()->with('success','Genre dihapus!');
    }
}
