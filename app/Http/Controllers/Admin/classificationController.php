<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classi;


class classificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

    $classifications = Classi::when($search, function ($query, $search) {
            $query->where('name', 'LIKE', "%$search%");
        })->get();

    return view('Admin.Classification.index', compact('classifications', 'search'));
        //
        //$classifications = Classi::all();
        //return view('Admin.Classification.index',compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Classification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input=$request->validate([
            'name'=>'required|string|max:255',
        ]);
        Classi::create($input);
        return redirect()->route('classifications.index')
        ->with('success','Classification created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classi $classification)
    {
        //
        return view('Admin.Classification.show',compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classi $classification)
    {
        //
        return view('Admin.Classification.edit',compact('classification'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classi $classification)
    {
        //
        $input=$request->validate([
            'name'=>'required|string|max:255',
        ]);
        $classification->update($input);
        return redirect()->route('classifications.index')
        ->with('success','Classification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classi $classification)
    {
        //
        $classification->delete();
        return redirect()->route('classifications.index')->with('success','Classification deleted successfully');


    }
}
