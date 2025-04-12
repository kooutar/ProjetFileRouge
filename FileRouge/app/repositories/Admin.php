<?php

namespace App\repositories;

use App\repositories\Interfaces\InterfaceUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class Admin implements InterfaceUser
{
    public function registre(array $data){
        
    }
    public function login(array $data){
        // if($token=Auth::attempt($data)){
        //     return response()->json(
        //      [
        //          'success' => true,
        //          'token' => $token,
        //          'expiration' => JWTAuth::factory()->getTTL() * 60// convertition en seconde TTL de config/JWT
        //      ]);
        // }else{
        //     return response()->json(['message'=>'les info invalide']);
        // }
     }
    public function logout(array $data){
        
    }
    public function update(array $data ,$id){
        
    }
    public function delete($id){
        
    }
    public function findByEmail($email){
        
    }
}
