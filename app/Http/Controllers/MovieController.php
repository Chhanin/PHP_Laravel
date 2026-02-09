<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Studio;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        $studios = Studio::all();

        return view('movies.create', compact('directors', 'studios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_movie' => ['required', 'string', 'max:40'],
            'Director_idDirector' => ['required', 'integer'],
            'Studio_idStudio' => ['required', 'integer'],
            'country_of_release' => ['required', 'string', 'max:20'],
            'year_of_release' => ['required', 'integer'],
            'language' => ['required', 'string', 'max:15'],
            'filming_location' => ['required', 'string', 'max:30'],
            'category' => ['required', 'string', 'max:20'],
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
