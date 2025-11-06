<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() { $genres = Genre::all(); return view('genres.index', compact('genres')); }
    public function create() { return view('genres.create'); }
    public function store(Request $request) { Genre::create($request->validate(['name'=>'required'])); return redirect()->route('genres.index')->with('success','Genre ditambahkan!'); }
    public function edit(Genre $genre) { return view('genres.edit', compact('genre')); }
    public function update(Request $request, Genre $genre) { $genre->update($request->validate(['name'=>'required'])); return redirect()->route('genres.index')->with('success','Genre diperbarui!'); }
    public function destroy(Genre $genre) { $genre->delete(); return back()->with('success','Genre dihapus!'); }
}
