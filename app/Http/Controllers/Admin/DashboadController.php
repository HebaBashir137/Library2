<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classi;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboadController extends Controller
{
    //
    public function index()
    {
        $classifications = Classi::count();
       $type=Type::count();
       $categories=Category::count();
       $chartlabels=Classi::pluck('name');
       $chartValuuse=Classi::withCount('categories')->pluck('categories_count');
        return view('admin.dashboard.index',compact(['classifications','type','categories','chartlabels','chartValuuse']));
    }
}
