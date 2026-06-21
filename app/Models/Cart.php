<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id',
        'book_id',
        'qty',
    ];  

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    //overrid non built in structure
    //abstract class no objects 
    //with and with count (load for relations)
    // eleqount abstracted from php
        protected $appends = ['total'];
         

    public function getTotalAttribute(){
        if ($this->relationLoaded('book') && $this->book) {
        return $this->quantity * $this->book->price;}
        return 0.1;
    }
    // WRONG: Typo in method name


    public function decrease(){
        return $this->book()->update([
            'quantity'=>$this->book->quantity-$this->qty
        ]);
    }
}
