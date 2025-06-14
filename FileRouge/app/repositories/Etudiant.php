<?php

namespace App\repositories;

use App\Models\etudiantCoursView;
use App\Models\user as ModelsUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant as ModelsEtudiant;
use App\repositories\Interfaces\InterfaceUser;
use App\repositories\Interfaces\InterfaceEtudiant;

class Etudiant implements InterfaceUser ,InterfaceEtudiant
{ 


        public function registre(array $data){
           $user= ModelsUser::create($data);
            return ModelsEtudiant::create([
                'id_user'=>$user->id,
                'social_id' => isset($data['social_id']) ? $data['social_id'] : null,
                'social_type' => isset($data['social_type']) ? $data['social_type'] : null,
            ]);
   
        }
        public function login(array $data){
           if($token=Auth::attempt($data)){
               return response()->json(
                [
                    'success' => true,
                    'token' => $token,
                    'expiration' => JWTAuth::factory()->getTTL() * 60// convertition en seconde TTL de config/JWT
                ]);
           }else{
               return response()->json(['message'=>'les info invalide']);
           }
        }
        public function logout(array $data){
            
        }
        public function update(array $data ,$id){

        }
        public function delete($id){

        }
        public function changeStatus($id){
            
        }

        public function findByEmail($email)
        {
          return ModelsUser::where('email', $email)->first();
        }

        public function getCoursEtudiant($idetudiant){
            return etudiantCoursView::where('id_user', $idetudiant)->get();
        }


  
}
