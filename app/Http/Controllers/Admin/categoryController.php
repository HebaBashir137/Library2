<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Classi;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        //
        $categories = Category::all();
        return view('Admin.Category.index',compact('categories'));
        //categories here is relation
        //get collection of objects 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classifications = Classi::all();
        return view('Admin.Category.create', compact('classifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'classi_id' => 'nullable|exists:classis,id' 
    ]);
    Category::create($input);
    return redirect()->route('categories.index')
    ->with('success','Category created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('Admin.Category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // like create 
        $classifications = Classi::all();
        return view('Admin.Category.edit',compact('category', ['classifications','category']));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{// action 
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'classi_id' => 'required|exists:classis,id' // Use same table name here
    ]);
    $category->update($input);
    return redirect()->route('categories.index')
    ->with('success','Category updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');

    }
}
