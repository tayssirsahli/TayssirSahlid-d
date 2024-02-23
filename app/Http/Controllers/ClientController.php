<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function dashhomePage()
    {
        $categories = Categorie::all();
        $products = Produit::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            return view('dashboard')->with(['products' => $products, 'categories' => $categories])->with("orderCount", $orderCount)->with("commande", $commande);
        } else {
            return view('dashboard')->with(['products' => $products, 'categories' => $categories]);
        }
    }

    public function aboutPage()
    {
        $categories = Categorie::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }

            return view('about')->with("categories", $categories)->with("orderCount", $orderCount)->with("commande", $commande);
        } else {
            return view('about')->with("categories", $categories);
        }
    }
    public function contactPage()
    {
        $categories = Categorie::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            return view('contact')->with("categories", $categories)->with("orderCount", $orderCount)->with("commande", $commande);
        } else {
            return view('contact')->with("categories", $categories);
        }
    }

    public function all()
    {
        $categories = Categorie::all();
        $products = Produit::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            return view('shop')->with(['products' => $products, 'categories' => $categories])->with("orderCount", $orderCount);
        } else {
            return view('shop')->with(['products' => $products, 'categories' => $categories]);
        }
    }

    public function index($CategoryId)
    {

        $products = Produit::byCategory($CategoryId)->get();

        $categories = Categorie::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();

            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            if ($products) {
                return view('shop')->with(['products' => $products, 'categories' => $categories])->with("orderCount", $orderCount)->with("commande", $commande);
            }
            return view('shop')->with(['products' => $products, 'categories' => $categories])->with("orderCount", $orderCount)->with("commande", $commande);
        } else {
            return view('shop')->with(['products' => $products, 'categories' => $categories]);
        }
    }


    public function filterByName(Request $request)
    {
        $productName = $request->input('name');
        $products = Produit::where('name', 'like', "$productName")->get();
        $categories = Categorie::all();

        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            if ($products->isEmpty()) {

                return back()->withInput()->with(['error' => 'Product not found', 'products' => $products, 'categories' => $categories])->with("orderCount", $orderCount);
            }

            return view('shop')->with("products", $products)->with("categories", $categories)->with("orderCount", $orderCount);
        } else {
            return view('shop')->with("products", $products)->with("categories", $categories);
        }
    }
    public function Detailproduct($id_produit)
    {
        $product = Produit::find($id_produit);
        $products = Produit::all();
        $categories = Categorie::all();
        if (Auth::check()) {
            $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
            if ($commande) {
                $orderCount = $commande->ligne_commandes()->count();
            } else {
                $orderCount = 0;
            }
            return view("détailproduit", compact('product'))->with("products", $products)->with("categories", $categories)->with("orderCount", $orderCount)->with("commande", $commande);
        } else {
            return view("détailproduit", compact('product'))->with("products", $products)->with("categories", $categories);
        }
    }
    public function header()
    {
        $categories = Categorie::all();
        $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
        if ($commande) {
            $orderCount = $commande->ligne_commandes()->count();
        } else {
            $orderCount = 0;
        }
        return view('template.header')->with("categories", $categories)->with("orderCount", $orderCount)->with("commande", $commande);
    }



    public function contactPost(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        $to = "sahlitayssir34@email.com";
        $subject = "Nouveau message de contact de $name";
        $body = "Nom: $name\n";
        $body .= "E-mail: $email\n";
        $body .= "Message:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            return back()->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons bientôt.');
        } else {
            return back()->with('success', 'Erreur lors de l\'envoi du message. Veuillez réessayer plus tard.');
        }
    }
}
