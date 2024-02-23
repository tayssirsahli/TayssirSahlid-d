<?php

namespace App\Http\Controllers;

use App\Models\LigneCommande;
use App\Models\Produit;
use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
   public function deleteligne(Request $req)
   {

      $ligneCommande = LigneCommande::find($req->id);

      if ($ligneCommande) {
         $product = Produit::find($ligneCommande->product_id);

         $product->quantity += $ligneCommande->qte;
         $product->save();
         $ligneCommande->delete();
      }
      if (LigneCommande::count() == 0) {
         return redirect('/shop');
     }
      return redirect('panier');
   }
   
}
