<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class chatController extends Controller
{
    //
    public function envoyerMessage(Request $request)
    {
        $message = $request->message;
        $coursId = $request->cours_id;
    
        // Vérifier si les données sont bien récupérées
        if (!$message || !$coursId) {
            return response()->json(['error' => 'Message ou Cours ID manquant'], 400);
        }
    
        // Diffuser l'événement
        broadcast(new MessageSent(auth()->user(), $message, $coursId))->toOthers();
    
        return response()->json(['status' => 'Message envoyé avec succès']);
    }
}
