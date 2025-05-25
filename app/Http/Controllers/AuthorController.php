<?php

namespace App\Http\Controllers;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
{
   return response()->json(Author::all());
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $author = Author::create($validated);
    return response()->json($author, 201);
}
}
