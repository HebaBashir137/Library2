<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $books = Book::with('type')->when($search, function ($query, $search) {
            $query->where('title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%")
                ->orWhereHas('type', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
        })
            ->get();
        return view('Admin.Book.index', compact('books', 'search'));

        //->get();
        // return view('Admin.Book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();
        return view('Admin.Book.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:png,jpg',
            'publisher' => 'nullable|string|max:255',
        ]);
        $input = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('Book', 'public');
            $input['imgurl'] = Storage::url($path);
        }
        Book::create($input);
        return redirect()->route('books.index')
            ->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //

        return view('Admin.Book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //

        $types = Type::all();
        return view('Admin.Book.edit', compact(['book', 'types']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:png,jpg',
            'publisher' => 'nullable|string|max:255',


        ]);
        $input = $request->except('image');

        if ($request->hasFile('image')) {

            if ($book->imgurl) {
                Storage::disk('public')->delete(str_replace('/storage', 'public', $book->imgurl));
            }

            $image = $request->file('image');
            $path = $image->store('Book', 'public');
            $input['imgurl'] = Storage::url($path);
            $book->update($input);
            return redirect()->route('books.index')
                ->with('success', 'Book updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //

        if ($book->imgurl) {
            Storage::disk('public')->delete(str_replace('/storage', 'public', $book->imgurl));
        }
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
