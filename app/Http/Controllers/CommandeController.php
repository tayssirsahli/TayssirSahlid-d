<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Produit;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
   public function store(Request $req)
   {
      // Récupérer la commande en cours pour l'utilisateur
      $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();

      if (!$commande) {
         // Si aucune commande en cours, créer une nouvelle commande pour l'utilisateur
         $commande = new Commande();
         $commande->client_id = Auth::user()->id;
         $commande->save();
      }

      // Récupérer la quantité disponible du produit
      $product = Produit::find($req->idproduct);
      $quantity_available = $product->quantity;

      // Vérifier si la quantité commandée est valide
      if (!$req->qte || $req->qte > $quantity_available) {
         return redirect()->back()->with('Error', 'Invalid quantity or not enough quantity available');
      }

      // Créer une nouvelle ligne de commande
      $lc = new LigneCommande();
      $lc->qte = $req->qte;
      $lc->product_id = $req->idproduct;
      $lc->commande_id = $commande->id;
      $lc->save();

      // Mettre à jour la quantité disponible du produit
      $product->quantity -= $req->qte;
      $product->save();

      return redirect('panier')->with('Success', 'Success');
   }


   public function panier()
   {

      $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
      if ($commande) {
         $orderCount = $commande->ligne_commandes()->count();
      } else {
         $orderCount = 0;
         return redirect()->back()->withErrors('No active order found.');
      }
      $categories = Categorie::all();
      $products = Produit::all();
      return view('panier')->with("categories", $categories)->with("product", $products)->with("commande", $commande)->with("orderCount", $orderCount);
   }



   public function Commande()
   {
      $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
      if ($commande) {
         $orderCount = $commande->ligne_commandes()->count();
      } else {
         $orderCount = 0;
      }
      $categories = Categorie::all();
      $products = Produit::all();

      return view('commande')->with("categories", $categories)->with("product", $products)->with("orderCount", $orderCount);
   }
   public function valider(Request $request)
   {

      $commande = Commande::where('client_id', Auth::user()->id)
         ->where('etat', 'en cours')
         ->first();

      if ($commande) {
         $commande->etat = "valider";
         $commande->save();
         $orderCount = 0;
      } else {
         $orderCount = $commande->ligne_commandes()->count();
      }

      $name = $request->name;
      $email = $request->email;
      $message = $request->message;

      $to = "sahlitayssir34@email.com";
      $subject = "Nouveau message de contact de $name";
      $body = "Nom: $name\n";
      $body .= "E-mail: $email\n";
      $body .= "Message:\n$message";
      $headers = "From: $email";
      mail($to, $subject, $body, $headers);

      $categories = Categorie::all();
      $products = Produit::all();


      return view('panier', compact('categories', 'products', 'commande', 'orderCount'));
   }


   public function supprimerCommande($id)
   {
      $commande = Commande::find($id);

      if (!$commande) {
         return redirect()->back()->with('error', 'Commande introuvable.');
      }

      // Récupérer toutes les lignes de commande associées à cette commande
      $ligneCommandes = $commande->ligne_commandes;

      // Parcourir chaque ligne de commande
      foreach ($ligneCommandes as $ligneCommande) {
         // Récupérer le produit associé à cette ligne de commande
         $product = Produit::find($ligneCommande->product_id);

         // Ajouter la quantité de cette ligne de commande à la quantité disponible du produit
         $product->quantity += $ligneCommande->qte;
         $product->save();
      }

      // Supprimer toutes les lignes de commande associées à cette commande
      $commande->ligne_commandes()->delete();

      // Supprimer la commande elle-même
      $commande->delete();

      return redirect('/shop')->with('success', 'Commande supprimée avec succès.');
   }
}
