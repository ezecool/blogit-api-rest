<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    function index() {
        // return 'Usuarios';
        $usuario = new User();
        $usuario->name = 'Hernan';
        $usuario->email = 'hernan@email.com';
        return response()->json([$usuario], 200);
    }
}
