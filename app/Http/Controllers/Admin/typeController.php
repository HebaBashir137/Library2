<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;


class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        //
        $types = Type::all();
        return view('Admin.Type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = \App\Models\Category::all();
    return view('Admin.Type.create', compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'edition' => 'required|string|max:255'
    ]);
    Type::create($input);
    return redirect()->route('types.index')
    ->with('success','Type created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
        return view('Admin.Type.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Type $type)
{
    $categories = \App\Models\Category::all();
    return view('Admin.Type.edit', compact('type', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
{
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id', // Use same table name here
        'edition' => 'required|string|max:255'
    ]);
    $type->update($input);
    return redirect()->route('types.index')
    ->with('success','Type updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return redirect()->route('types.index')->with('success','Type deleted successfully');
    }
}
