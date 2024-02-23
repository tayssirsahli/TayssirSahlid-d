<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function AddProduct(Request $request){
        
        $existingUser = Produit::where('name', $request->name)->first();

        if ($existingUser) {
            return view ('admin.produits.lister')->with('error', 'Product already exists.');
        }
        $p = new Produit();
        $p ->name = $request ->name;
        $p ->description = $request ->description;
        $p ->price = $request ->price;
        $p ->quantity = $request ->quantity;
        $p ->Category_id = $request ->Category_id;


        //Uplode image

        $newname =uniqid();
        $image = $request ->file('productImage');
        $newname.="." .$image -> getClientOriginalExtension();
        $destinationPath = "Uploads";
        $image -> move ($destinationPath ,$newname);

        $p ->photo = $newname;
        if ($p->save()){
           
            return redirect()->back();

        }else {
            return "erreur d\'ajout";
        }


    }


    public function listeProducts()
    {
        $products = Produit::all();
        $categories = Categorie::all();
        return view ('admin.produits.lister')-> with(["products"=>$products ,"categories"=>$categories]);
    }

    public function updateProduct(Request $request)
    {
        $id = $request -> id_produit;
        $produit=Produit::find($id);

        if (!$produit) {
            return "Produit non trouvé"; 
        }
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->price = $request->price;
        $produit->quantity = $request->quantity;

        if($produit -> update()){

            return redirect()->back();

        }else {
            return "erreur de modification";
        }
    } 

   
    public function deleteProd(Request $req){

        $produit = Produit::find($req->id);
        $produit->delete();
        
        return redirect()->route('listproducts');

    }

    public function filterByNameProduit(Request $request)
    {
        $productName = $request->input('name');
        $products = Produit::where('name' , 'like', "$productName")->get();
        $categories = Categorie::all();
        if($products->isEmpty())
        {
            
            return back()->withInput()->with(['erreur' => 'Product not found', 'products' => $products, 'categories' => $categories]);
        }
        return view('admin.produits.lister')->with("products",$products)->with("categories",$categories);
    }
}
