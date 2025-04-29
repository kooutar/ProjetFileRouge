<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\services\ServiceCategorie;

class CategorieController extends Controller
{
   private $ServiceCategorie;
   public function __construct(ServiceCategorie $ServiceCategorie)
   {
      $this->ServiceCategorie=$ServiceCategorie;
   }

   public function store(Request $request){

     $validate =$request->validate([
        'categorie'=>'required',
        'parent_id',
     ]);
     
     $this->ServiceCategorie->addcategorieService($validate);
     return redirect('/tageCategorie')->with('success', 'Categorie ajoutée avec succès !');
   }
   public function getAllcategories(){
    $categories=$this->ServiceCategorie->GetAllCategoiesService();
    return view('pages.AdminPage.tag_categorie', compact('categories'));
   }

   public function deleteCategorie($id){
     $this->ServiceCategorie->deleteService($id);
     return redirect('/tageCategorie')->with('success', 'Categorie supprimmée avec succès !');
   }

   public function updateCategorie(Request $request, $id){
   
      $validate =$request->validate([
         'categorie'=>'required',
         'parent_id',
      ]);
      $this->ServiceCategorie->updateService($request->all(),$id);
      
     return redirect('/tageCategorie')->with('success', 'Categorie modifié avec succès !');
   }

   public function getSubcategories($id)
{
    $subcategories = Categorie::where('parent_id', $id)->get();

    return response()->json($subcategories);
}

}
