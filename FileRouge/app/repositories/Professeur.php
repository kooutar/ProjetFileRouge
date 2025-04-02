<?php

namespace App\repositories;

use App\Models\vueProf;
use App\Models\user as ModelsUser;

use Illuminate\Support\Facades\DB;
use App\Models\Professeur as ModelsProfesseur;
use App\repositories\Interfaces\InterfaceUser;
use App\repositories\Interfaces\InterfaceProfesseur;

class Professeur  implements InterfaceUser ,InterfaceProfesseur
{

    public function findById($id)
    {
       return ModelsProfesseur::where('id_user',$id)->first(); 
    }
    public function registre(array $data){
     $user= ModelsUser::create($data);
     return ModelsProfesseur::create([
        'id_user'=>$user->id,
        'path_cv' => $data['path_cv'],
        'telephone' => $data['telephone'],
        'deplome' => $data['deplome'],
        'domaine' => $data['domaine'],
    ]);
    }
    public function login(array $data){

    }
    public function logout(array $data){

    }
    public function update(array $data ,$id){

    }
    public function delete($id){

    }
    public function changeStatus($id){
        
    }

    public function accepterprof($id){
      $prof=$this->findById($id);
      if ($prof) { // Vérifier si le professeur existe
        $prof->status = 'activer';
        $prof->save();
        return redirect()->back()->with('success', 'Professeur activé avec succès !');
    }

    return redirect()->back()->with('error', 'Professeur non trouvé.');
    }

    public function findByEmail($email)
    {
        
    }


    public function getAllprof(){
         return vueProf::all();
    }
   
}
