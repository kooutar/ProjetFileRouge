<?php

namespace App\Http\Controllers;

use App\services\ServiceCategorie;
use Illuminate\Http\Request;

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
     
     $this->ServiceCategorie->addcategorieService($request->all());
   }
   public function getAllcategories(){
    $categories=$this->ServiceCategorie->GetAllService();
    return view('pages.AdminPage.tag_categorie', compact('categories'));
   }

   public function deleteCategorie($id){
     $this->ServiceCategorie->deleteService($id);
   }

   public function updateCategorie(Request $request, $id){
   
      $validate =$request->validate([
         'categorie'=>'required',
         'parent_id',
      ]);
      $this->ServiceCategorie->updateService($request->all(),$id);
   }
}
