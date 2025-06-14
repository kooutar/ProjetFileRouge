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

    public function GetAllCategoiesService(){
        return $this->categorieRepositery->GetAll();
    }

    public function deleteService($id){
        return $this->categorieRepositery->delete($id);
    }

    public function updateService($data,$id){
        return $this->categorieRepositery->update($data,$id);
    }
}
