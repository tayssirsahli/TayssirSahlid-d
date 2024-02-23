<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
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
    
    public function ligne_commandes(){

        return $this->hasMany(LigneCommande::class,'commande_id','id');
    }
    
}
