<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Book extends Model
{
    use HasFactory;
    //
    protected $fillable = ['title', 'author', 'type_id', 'quantity', 'price', 'imgurl', 'publisher'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    //get scope active 
    
}
