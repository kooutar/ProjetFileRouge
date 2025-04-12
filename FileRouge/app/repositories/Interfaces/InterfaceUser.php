<?php

namespace App\repositories\Interfaces;

interface InterfaceUser
{
    //
    // public function registre(array $data);
    public function login(array $data);
    public function logout(array $data);
    // public function update(array $data ,$id);
    // public function delete($id);
    // public function findByEmail($email);
}
