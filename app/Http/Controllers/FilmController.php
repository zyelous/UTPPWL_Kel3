<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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
            'title'    => 'required|string|max:255',
            'year'     => 'required|integer',
            'rating'   => 'required|numeric|min:0|max:10',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|boolean',
            'release_date' => 'nullable|date',
            'synopsis' => 'nullable|string'
        ]);

        $data['user_id'] = auth()->id();

        if (!empty($data['synopsis'])) {
            $data['synopsis'] = Crypt::encryptString($data['synopsis']);
        }

        if ($request->hasFile('poster')) {
            try {
                $data['poster'] = $request->file('poster')->store('posters', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['poster' => 'Gagal mengunggah poster.'])->withInput();
            }
        }

        Film::create($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();

        try {
            if (!empty($film->synopsis)) {
                $film->synopsis = Crypt::decryptString($film->synopsis);
            }
        } catch (DecryptException $e) {
            $film->synopsis = '[Sinopsis tidak dapat dibaca]';
        }

        return view('films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'year'     => 'required|integer',
            'rating'   => 'required|numeric|min:0|max:10',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|boolean',
            'release_date' => 'nullable|date',
            'synopsis' => 'nullable|string'
        ]);

        if (!empty($data['synopsis'])) {
            $data['synopsis'] = Crypt::encryptString($data['synopsis']);
        }

        if ($request->hasFile('poster')) {
            try {
                if (!empty($film->poster) && Storage::exists('public/' . $film->poster)) {
                    Storage::delete('public/' . $film->poster);
                }
                $data['poster'] = $request->file('poster')->store('posters', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['poster' => 'Gagal memperbarui poster.'])->withInput();
            }
        }

        $film->update($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Film $film)
    {
        try {
            if (!empty($film->poster) && Storage::exists('public/' . $film->poster)) {
                Storage::delete('public/' . $film->poster);
            }
            $film->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['delete' => 'Gagal menghapus film.']);
        }

        return back()->with('success', 'Film dihapus!');
    }

    public function showForUser()
    {
        $featured = Film::with('genre')
            ->where('is_featured', true)
            ->orderByDesc('year')
            ->take(8)
            ->get();

        $latest = Film::with('genre')
            ->orderByDesc('release_date')
            ->take(20)
            ->get();

        $action = Film::with('genre')
            ->whereHas('genre', fn($q) => $q->where('name', 'Action'))
            ->take(6)
            ->get();

        $horror = Film::with('genre')
            ->whereHas('genre', fn($q) => $q->where('name', 'Horror'))
            ->take(6)
            ->get();

       
        foreach ([$featured, $latest, $action, $horror] as $collection) {
    foreach ($collection as $film) {
        if (!empty($film->synopsis)) {
            try {
                if (preg_match('/^[A-Za-z0-9\/+=]{40,}$/', $film->synopsis)) {
                    $film->synopsis = Crypt::decryptString($film->synopsis);
                }
                else {
                    $film->synopsis = $film->synopsis;
                }
            } catch (DecryptException $e) {
                $film->synopsis = '[Sinopsis tidak tersedia]';
            }
        } else {
            $film->synopsis = '-';
        }
    }
}

        return view('user.home', compact('featured', 'latest', 'action', 'horror'));
    }
    public function showGenresForUser()
    {
         $genre = Genre::orderBy('name', 'asc')->get();
         return view('user.genre', compact('genre'));
    }
    public function showFilmByGenre($name)
    {
    $genre = Genre::where('name', $name)->firstOrFail();
    $film = Film::with('genre')
                ->whereHas('genre', fn($q) => $q->where('name', $name))
                ->orderBy('created_at', 'desc')
                ->get();

    return view('user.genre-film', compact('genre', 'film'));
    }
    // gunakan atasan file: use App\Models\Film;

public function showFilmDetail(Film $film)
{
    // eager load genre (jika relasi)
    $film->load('genre');

    // tampilkan view detail (user)
    return view('user.film-show', compact('film'));
}

}