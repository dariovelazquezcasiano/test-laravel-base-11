<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //cuando no creamos los campos de timestamps devemos indicar que son falsos
    public $timestamps = false;

    //definimos los parametros que se expondran
    protected $fillable = ['id', 'title', 'slug'];

    function categories(){
        return $this->hasMany(Category::class);
    }

}
