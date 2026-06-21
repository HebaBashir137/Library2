<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrederItem extends Model
{
    //
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Oreder::class,'id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class,'id');}

    
}
