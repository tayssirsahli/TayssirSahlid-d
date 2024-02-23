<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Categorie::all();

        $prod = Produit::count();
        $cate = Categorie::count();
        $user = User::count();
        return view('admin.dashboard')->with(['qte' => $prod, 'categoryCount' => $cate, 'user' => $user])->with("categories",$categories);
    }
    public function logout()
    {
        $categories = Categorie::all();

        Auth::logout();

        return redirect()->route('login')->with("categories",$categories);
    }

    public function editeProfile(Request $req)
{
    $categories = Categorie::all();

    $user = User::find(Auth::id());

    if (!$user) {
        return redirect('/admin/profile')->with('error', 'Utilisateur non trouvé')->with("categories", $categories);
    }

    $user->name = $req->name;
    $user->tel = $req->tel;
    $user->city = $req->city;
    $user->street = $req->street;
    $user->state = $req->state;
    $user->zip_code = $req->zip_code;
    $user->email = $req->email;

    if ($req->password) {
        $user->password = Hash::make($req->password);
    }

    $user->save(); // Use save() instead of update()

    return redirect('/admin/profile')->with('success', 'Admin modifié')->with("categories",$categories);
}


    public function Profile()
    {
        $categories = Categorie::all();

        return view('admin.profile')->with("categories",$categories);
    }
 
}
