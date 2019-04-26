<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();

        return response()->json($books);
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        Book::destroy($id);

        return response()->json(null, 204);
    }
}