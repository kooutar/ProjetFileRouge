<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use App\services\ServiceEtudiant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\repositories\Interfaces\InterfaceUser;

class UserController extends Controller
{
    //
    private $userRepo;
    public function __construct(InterfaceUser $userRepo)
    {
        $this->userRepo = $userRepo;
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return $this->userRepo->login($request->only('email', 'password'));
    }

 public function logout(Request $request){
   Auth::logout();
   return redirect('/login');
 }
    public function index(){
        $top3Cours = Cours::withCount('inscriptions')
        ->orderByDesc('inscriptions_count')
        ->limit(3)
        ->get();
        return view('welcome',compact('top3Cours'));
    }
}
