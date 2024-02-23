<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homePage(){
        $categories = Categorie::all();

        return view('home')->with("categories",$categories);;
    }
   

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
       if(Auth::user()->role == "admin")
       {
            //dd(Auth::user()->role);
            return redirect('/admin/dashboard');
       }else{
           // dd( "error");
            return redirect('/client/dashboard');
       }
    } 
}
