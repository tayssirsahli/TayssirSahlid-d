<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/client/dashboard', [ClientController::class, 'dashhomePage'])->name('dashClient');


Route::get('/about', [ClientController::class,'aboutPage'])->name('about');
Route::get('/contact', [ClientController::class,'contactPage'])->name('contact');

//authentification
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/products/{CategoryId}', [ClientController::class,'index']);
Route::get('/shop', [ClientController::class,'all'])->name('shop');  



Route::get('/DetailproductPage/{id_produit}', [ClientController::class,'Detailproduct'])->name('DetailproductPage');

Route::get('/filterByName', [ClientController::class,'filterByName'])->name('filterByName');

Route::get('/header', [ClientController::class,'header'])->name('header'); 
 
//Route::post('/sendEmail', [EmailController::class, 'sendEmail'])->name('sendEmail');



Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/client/logout', [AuthController::class, 'logout'])->name('clientlogout');
    Route::post('/mail', [ClientController::class, 'contactPost'])->name('mail');
    Route::post('/store', [CommandeController::class,'store'])->name('store');  
    Route::get('/panier', [CommandeController::class, 'panier'])->name('panier');
    Route::get('/ligneCommande/delete/{id}', [LigneCommandeController::class, 'deleteligne']);
    Route::get('/Commande', [CommandeController::class, 'Commande'])->name('Commande');
    Route::get('/valider', [CommandeController::class, 'valider'])->name('valider');
    Route::get('/supprimer-commande/{id}', [CommandeController::class, 'supprimerCommande'])->name('supprimer');


});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //category
    Route::get('/admin/categories', [CategorieController::class, 'categoryPage'])->name('category');
    //show
    Route::get('/admin/categories', [CategorieController::class, 'allcategory'])->name('category');

    //add category
    Route::post('/admin/categories/add', [CategorieController::class, 'AddCategory'])->name('addcategory');

    //delete
    Route::get('/delete/{id}', [CategorieController::class, 'deleteCat']);
    //edite
    Route::get('/edit/{id}', [CategorieController::class, 'recherchEdit']);

    Route::post('/edit/{id}', [CategorieController::class, 'update']);

    //products 


    Route::get('/listproduct', [ProduitController::class, 'listeProducts'])->name('listproducts');
    //add
    Route::post('/addproduct', [ProduitController::class, 'AddProduct'])->name('addproduct');

    //edite
    Route::post('/product/updateproduct', [ProduitController::class, 'updateProduct'])->name('updateproduct');

    Route::get('/produit/delete/{id}', [ProduitController::class, 'deleteProd']);


    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('profile');

    Route::post('/admin/editprofile', [AdminController::class, 'editeProfile']);

    
    Route::get('/admin/profile', [AdminController::class,'Profile'])->name('profile');

    Route::post('/admin/editeprofile', [AdminController::class,'editeProfile'])->name('editeprofile');

    Route::get('produit/filterByName', [ProduitController::class,'filterByNameProduit'])->name('filterProduit');
    
    Route::get('category/filterByName', [CategorieController::class,'filterByNameCategory'])->name('filterCategories');


});

