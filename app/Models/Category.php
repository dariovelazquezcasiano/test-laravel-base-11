<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //definimos los parametros que se expondran
    protected $fillable = ['title', 'slug'];

    function posts(){
        return $this->hasMany(Post::class);
    }

}
