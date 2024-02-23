<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    protected $table = 'ligne_commandes';
    use HasFactory;
    public function commande(){
        return $this->belongsTo(Commande::class,'commande_id','id');
    }
    public function product(){
        return $this->belongsTo(Produit::class,'product_id','id');
    }

}
