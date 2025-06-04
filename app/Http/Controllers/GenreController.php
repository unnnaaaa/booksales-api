<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = genre::all();

    if ($genres->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Not Found!"
        ], 200);
    }
    return response()->json([
        "success" => true,
        "message"=> "Get All Resources",
        "data" => $genres
    ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
        return Genre::create($validated);
    }
     public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
        return $genre;
    }
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $genre->update($validated);
        return response()->json(['message' => 'Genre updated successfully', 'data' => $genre]);
    }
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $genre->delete();
        return response()->json(['message' => 'Genre deleted successfully']);


}
}
