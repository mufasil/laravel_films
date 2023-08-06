<?php

namespace App\Http\Controllers\Frontend\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\StoreFilmCommentRequest;
use App\Models\Comment;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['comments'])->paginate(1);
        return view('front.films.index', compact('films'));
    }

    public function show($slug)
    {
        $film = Film::where('slug', $slug)->first();
        return view('front.films.show', compact('film'));
    }

    public function storeComments(StoreFilmCommentRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = 1;
        $data['film_id'] = $id;
        // Adding Comments
        Comment::create($data);
        return redirect()->back();
    }
}
