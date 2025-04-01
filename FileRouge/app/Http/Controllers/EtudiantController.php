<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\ServiceEtudiant;
use Laravel\Socialite\Facades\Socialite;

class EtudiantController extends Controller
{
   private $EtudiantService;
   public function __construct(ServiceEtudiant $EtudiantService)
   {
     $this->EtudiantService=$EtudiantService;
   }
    // for socailite
   public function store(Request $request){
     $datavalidate=$request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users|max:255',
    'password' => 'required|min:6|confirmed',
     ]);
     $etudiant =$this->EtudiantService->RegistreService($datavalidate);
     return response()->json(['Sussus'=>$etudiant]);
   }

   public function login(Request $request){
    $datavalidate=$request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
         ]);
         $etudiant =$this->EtudiantService->loginService($datavalidate);
        //  return response()->json(['Sussus'=>$etudiant]);
   }

    // Rediriger vers le fournisseur OAuth
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Gérer le retour du fournisseur
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $etudiant = $this->EtudiantService->socialLoginService($user);

        // return response()->json(['success' => $etudiant]);
        return redirect('/courses');
    }

}
