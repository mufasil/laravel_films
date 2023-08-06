<?php

namespace App\Http\Controllers\Frontend\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\StoreFilmCommentRequest;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Models\Comment;
use App\Models\Film;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['comments'])->paginate(1);
        return view('front.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('front.films.create', compact('genres'));
    }

    public function store(StoreFilmRequest $request)
    {
        DB::beginTransaction(); //starting DB transaction
        try {
            //saving film-slug-name
            $data = $request->all();
            $data['slug'] = strtolower(str_replace(" ", "-", $data['name']));
            //Uploading image
            $data['photo'] = uploadImage($request->file('photo'));
            // Creating Film
            $film = Film::create($data);
            // Sync Genres provided in request payload.
            $film->genres()->sync($data['genre_id']);
            // Commiting Changes if no exception catched
            DB::commit();
            return redirect()->back();
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show($slug)
    {
        $film = Film::where('slug', $slug)->first();
        return view('front.films.show', compact('film'));
    }

    public function storeComments(StoreFilmCommentRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id ?? 0;
        $data['film_id'] = $id;
        // Inserting Film Comments
        Comment::create($data);
        return redirect()->back();
    }
}
