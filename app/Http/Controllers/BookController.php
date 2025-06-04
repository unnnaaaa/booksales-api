<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller{
public function index()
{
    $books = Book::all();

    if ($books->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Not Found!"
        ], 200);
    }
    return response()->json([
        "success" => true,
        "message"=> "Get All Resources",
        "data" => $books
    ]);
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'cover_photo' => 'required|string',
        'genre_id' => 'required|exists:genres,id',
        'author_id' => 'required|exists:authors,id'
    ]);

    $book = Book::create($validated);

    return response()->json([
        'message' => 'Book created successfully',
        'data' => $book
    ], 201);
}
     public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return $book;
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'cover_photo' => 'required|string',
        'genre_id' => 'required|exists:genres,id',
        'author_id' => 'required|exists:authors,id'
        ]);

        $book->update($validated);
        return response()->json(['message' => 'Book updated successfully', 'data' => $book]);
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);


}
}