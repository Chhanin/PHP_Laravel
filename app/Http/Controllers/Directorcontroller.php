<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Dir;
use App\Models\Director;

class Directorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_director' => ['required', 'string', 'max:255'],
            'gender_director' => ['nullable', 'string', 'max:50'],
            'place_birth_director' => ['nullable', 'string', 'max:255'],
            'country_director' => ['nullable', 'string', 'max:255'],
            'year_birth_director' => ['nullable', 'integer'],
        ]);

        Director::create($validated);

        return redirect()->route('directors.index');
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
        $director = Director::findOrFail($id);

        return view('directors.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $director = Director::findOrFail($id);

        $validated = $request->validate([
            'name_director' => ['required', 'string', 'max:255'],
            'gender_director' => ['nullable', 'string', 'max:50'],
            'place_birth_director' => ['nullable', 'string', 'max:255'],
            'country_director' => ['nullable', 'string', 'max:255'],
            'year_birth_director' => ['nullable', 'integer'],
        ]);

        $director->update($validated);

        return redirect()->route('directors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $director = Director::findOrFail($id);
        $director->delete();

        return redirect()->route('directors.index');
    }
}
