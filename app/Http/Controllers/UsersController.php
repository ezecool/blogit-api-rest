<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    function index(Request $request) {

        // return 'Usuarios';
        // $usuario = new User();
        // $usuario->name = 'Hernan';
        // $usuario->email = 'hernan@email.com';
      
      if ($request->isJson()) {
        $users = User::all();
        return response()->json($users, 200);
      }

      return response()->json(['error' => 'No autorizado'], 401, []);
    }

    function createUser(Request $peticion) {

      if ($peticion->isJson()) {
        $data = $peticion->json()->all(); // Tomo todos los datos de la peticion
        $usuario = User::create([
          'name' => $data['name'],
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'api_token' => Str::random(60)
        ]);
        
        // Si el recurso se creo exitosamente, devuelvo el usuario en formato json y el coddigo 201 (recurso creado)
        return response()->json($usuario, 201);
      }

      return response()->json(['error' => 'No autorizado'], 401, []);
    }

    function getToken(Request $peticion) {
      if (!$peticion->isJson()) {
        return response()->json(['error' => 'No autorizado'], 401, []);
      } else {
        try {
          $data = $peticion->json()->all();

          // Uso el metodo where del modelo User para buscar si existe un usuario con el username proporcionado
          $usuario = User::where('username', $data['username'])->first();
          if ($usuario && Hash::check($data['password'], $usuario->password)) {
            return response()->json($usuario, 200);
          } else {
            return response()->json(['error' => 'Acceso incorrecto'], 406);
          }
        } catch (ModelNotFoundException $e) {
          return response()->json(['error' => 'Acceso incorrecto'], 406);
        }
      }
    }

}
