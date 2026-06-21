<?php

namespace App\Models;
use App\Models\OrederItem;

use App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Oreder extends Model
{
    //
    protected $fillable = [
        'user_id',
        'phonenumber',
        'Location',
        'totalprice',
        'Note',
        'status',
    ];
     public function Items()
    {
        return $this->hasMany(OrederItem::class, 'order_id');}

        public function user()
    {
        return $this->belongsTo(User::class);   }


        public function books()    {
        return $this->hasMany(Book::class,  'book_id');}

        public function orederItems()
    {
        return $this->hasMany(OrederItem::class, 'order_id');}
}
