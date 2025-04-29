<?php

use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });



Broadcast::channel('course-chat', function ($user) {
    // Ici, tu peux ajouter une condition :
    // Par exemple, vérifier que $user->role est 'student' ou 'teacher'

    return [
        'id' => $user->id,
        'name' => $user->name,
        'role' => $user->role, // 'teacher' ou 'student'
    ];
});

