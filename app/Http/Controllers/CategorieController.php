<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function categoryPage()
    {           
        $categories = Categorie::all();

        return view('admin.Categories.liste')->with("categories",$categories);
    }
    public function AddCategory(Request $request){
        $c = new Categorie();
        $c->name = $request->name;
        $c->description = $request->description;
        if ($request->hasFile('categoryPhoto')) {
            $newname = uniqid();
            $image = $request->file('categoryPhoto');
    
            if ($image->isValid()) {
                $newname .= "." . $image->getClientOriginalExtension();
                $destinationPath = "Uploads";
                $image->move($destinationPath, $newname);

                $c->photo = $newname;
            } else {
                
                return redirect()->route('category')->with('error', 'Erreur lors du téléchargement de l\'image');
            }
        }
 
        if($c->save()){
            return redirect()->route('category')->with('success', 'Catégorie ajoutée avec succès');
        } else {
            return redirect()->route('category')->with('error', 'Erreur lors de l\'ajout de la catégorie');
        }
    }
    

    public function allcategory(){
        $categories = Categorie::all();

        return view('admin.categories.liste')->with("categories",$categories);

    }


    public function deleteCat(Request $req){

        $categories = Categorie::find($req->id);
        $categories->delete();
        return redirect()->route('category');
    }
    //edit 
    public function recherchEdit(Request $req){
        $categories = Categorie::all();
        $category = Categorie::find($req->id);
        return view('admin.categories.editCategory')-> with(["category"=>$category ,"categories"=>$categories]);
    }

    public function update(Request $req){

        $categories = Categorie::find($req->id);
        if(!$categories)
        {
            return redirect()->route('category')->with('error', 'Category not found.');

        }

        $categories->update([
            'name'=>$req->name,
            'description' => $req->description,

        ]);
        return redirect()->route('category');
    }

    public function index()
    {
        $categories = Categorie::all();

        return view('template.header')->with("categories",$categories);
    }
    public function filterByNameCategory(Request $request)
    {
        $categoryName = $request->input('name');
        $categories = Categorie::where('name' , 'like', "$categoryName")->get();
        if($categories->isEmpty())
        {
            
            return back()->withInput()->with(['erreur' => 'Category not found','categories' => $categories]);
        }
        return view('admin.categories.liste')->with("categories",$categories);
    }



    
}
