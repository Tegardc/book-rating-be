<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $books = Books::take(10)->get();
        // return view('books.index', compact('books'));

        // $limit = $request->input('limit', 10);
        // $search = $request->input('search', null);

        // $books = Books::with('author', 'category')->withCount(['rating as average_rating' => function ($query) {
        //     $query->select(DB::raw('avg(rating)'));
        // }, 'rating as voters' => function ($query) {
        //     $query->select(DB::raw('count(*)'));
        // }])
        //     ->when($search, function ($query, $search) {
        //         $query->where('title', 'like', '%' . $search . '%')
        //             ->orWhereHas('author', function ($q) use ($search) {
        //                 $q->where('name', 'like', '%' . $search . '%');
        //             });
        //     })
        //     ->orderBy('average_rating', 'desc')
        //     ->paginate($limit); // Menggunakan paginate

        // return view('books.index', compact('books', 'limit'));

        $limit = $request->get('limit', 10);
        $search = $request->get('search', '');

        $books = Books::with(['author', 'category'])->withCount([
            'ratings as average_rating' => function ($query) {
                $query->select(DB::raw('AVG(rating)')); // Hitung rata-rata rating
            },
            'ratings as voters' => function ($query) {
                $query->select(DB::raw('COUNT(*)')); // Hitung jumlah voters
            }
        ])
            ->when($search, function ($query, $search) {
                return $query->where('books.title', 'like', "%{$search}%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })

            ->orderBy('average_rating', 'desc')
            ->paginate($limit);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
