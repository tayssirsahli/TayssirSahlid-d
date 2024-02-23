<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
    ];
    //use HasFactory;
    public function products(){

        return $this->hasMany(Produit::class);
    }
}
