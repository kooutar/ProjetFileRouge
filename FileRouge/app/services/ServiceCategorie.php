<?php

namespace App\services;

use App\repositories\Categorie as categorieRepositery;

class ServiceCategorie
{
    private $categorieRepositery;
    public function __construct(categorieRepositery $categorieRepositery)
    {
        $this->categorieRepositery=$categorieRepositery;
    }

    public function addcategorieService($data){  
        return $this->categorieRepositery->create($data);
    }

    public function GetAllService(){
        return $this->categorieRepositery->GetAll();
    }
}
