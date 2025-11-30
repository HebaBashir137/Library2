<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'classi_id',
    ];

    public function classification(){
        return $this->belongsTo(Classi::class,'classi_id','id');
    }
    public function types(){
        return $this->hasMany(Type::class,'category_id','id');
    }
}
