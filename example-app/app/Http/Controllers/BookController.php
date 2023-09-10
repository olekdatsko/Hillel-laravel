<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {

        return Book::all();
    }

    public function store(BookRequest $request)
    {

        $book = Book::create($request->all());
        return $book;
    }

    public function show($id)
    {

        $book = Book::findOrFail($id);
        return $book;
    }

    public function update(BookRequest $request, $id)
    {

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return $book;
    }

    public function destroy($id)
    {

        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
