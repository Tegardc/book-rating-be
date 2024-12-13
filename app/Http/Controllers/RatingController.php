<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Books;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $authors = Author::orderBy('name', 'asc')->get();
        // $books = collect(); // Awalnya koleksi kosong

        // if ($request->has('author_id')) {
        //     // Filter buku berdasarkan penulis yang dipilih
        //     $books = Books::where('author_id', $request->author_id)
        //         ->orderBy('title', 'asc') // Pastikan orderBy digunakan sebelum get
        //         ->get();
        // }

        // return view('ratings.create', compact('authors', 'books'));
        $authors = Author::with('books')->get();
        return view('ratings.index', compact('authors'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'books_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        $rating = Rating::create([
            'books_id' => $request->input('books_id'),
            'rating' => $request->input('rating'),
        ]);
        Log::info('Rating successfully created:', $rating->toArray());
        return redirect()->route('books.index')->with('success', 'Rating submitted successfully');
        // return redirect()->route('books.index')->with('success', 'Rating submitted successfully');
        // //
    }
    public function getBooks($author_id)
    {
        $books = Books::where('author_id', $author_id)->get(['id', 'title']);
        return response()->json($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
