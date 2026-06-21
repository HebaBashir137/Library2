<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Oreder;
use App\Models\Book;

class CartItem extends Model
{
    //
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Oreder::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
