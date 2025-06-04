<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
{
    $authors = Author::all();

    if ($authors->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Not Found!"
        ], 200);
    }
    return response()->json([
        "success" => true,
        "message"=> "Get All Resources",
        "data" => $authors
    ]);
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/authors'), $filename);

            $validated['photo'] = $filename;
        }

        $author = Author::create($validated);

        return response()->json($author, 201);
    }
    public function show($id)
        {
            $author = Author::find($id);
            if (!$author) {
                return response()->json(['message' => 'Author not found'], 404);
            }
            return $author;
        }

    public function update(Request $request, $id)
    {
    $author = Author::find($id);
    if (!$author) {
        return response()->json(['message' => 'Author not found'], 404);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/authors'), $filename);

        $validated['photo'] = $filename;

        if ($author->photo && file_exists(public_path('uploads/authors/' . $author->photo))) {
            unlink(public_path('uploads/authors/' . $author->photo));
        }
    }

    $author->update($validated);

    return response()->json([
        'message' => 'Author updated successfully',
        'data' => $author,
    ]);
}
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        $author->books()->delete();
        $author->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }
}
