<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['name', 'author', 'type_id', 'quantity', 'price', 'image', 'publisher'];

    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
}


    
