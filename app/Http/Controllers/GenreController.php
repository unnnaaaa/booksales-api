<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(Genre::all());
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);
        return response()->json($genre, 201);
}
}
