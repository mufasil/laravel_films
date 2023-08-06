<?php

namespace App\Http\Controllers\Api\V1\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Models\Film;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**  
     * Display a listing of the Films.
     * */
    public function index()
    {
        $films = Film::all();
        return apiResponse($films, 'Films Fetched Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */

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
            return apiResponse($film, 'Film created Successfully.');
        } catch (Exception $ex) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $film = Film::where('slug', $slug)->with(['comments', 'genres'])->first();
        return apiResponse($film, 'Film Fetched Successfully.');
    }
}
