<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classi extends Model
{
    protected $fillable = [
        'name',
    ];
    

    public function categories (){
        return $this->hasMany(Category::class,'classi_id','id'); 

    }
    
}
