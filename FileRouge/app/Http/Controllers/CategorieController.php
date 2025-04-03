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
     $this->ServiceCategorie->addcategorieService($validate);
   }
}
