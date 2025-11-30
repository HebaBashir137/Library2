<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('Admin.Book.index',compact('books'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'nullable|string|max:255',
        'type_id' => 'nullable|exists:types,id',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
    ]);
    Book::create($input);
    return redirect()->route('books.index')
    ->with('success','Book created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::findOrFail($id);
        return view('Admin.Book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::findOrFail($id);
        return view('Admin.Book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $book = Book::findOrFail($id);
        $input = $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'nullable|string|max:255',
        'type_id' => 'nullable|exists:types,id',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
        
        
        ]);
        $book->update($input);
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
