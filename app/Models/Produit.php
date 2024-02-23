<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'photo',
        'Category_id',

    ] ;
    //use HasFactory;
    public function category(){

        return $this->belongsTo(Categorie::class);
    }
    public function lignecommande(){

        return $this->hasMany(LigneCommande::class,'product_id','id');
    }
    //to filter products by category ID
    public function scopeByCategory($query,$CategoryId){

        return $query->where('Category_id',$CategoryId);
    }
    
}
