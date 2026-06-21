<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Book;
use Illuminate\Http\Request;

class usrBookController extends Controller
{
    //
    public function index(){
    $books = Book::orderBy('created_at', 'desc')->paginate(12);


        return view ('User.Book.index',compact('books'));
    }
    public function search(Request $request){
        $query=Book::query();
        if($request->has('title')){
            $query->where ('title','LIKE',$request->title.'%');

        }
        //$books=$query->get();
         $books=$query->paginate(12);
        return view ('User.Book.index',compact('books'));
    }
}
