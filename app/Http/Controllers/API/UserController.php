<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email","=",$request->email)->first();

        if(isset($user->id)){
            if(Hash::check($request->password,$user->password)){
                
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "res" => true,
                    "mensaje" => "Bienvenido, Usuario logueado correctamente",
                    "access_token" => $token
                ],200);
            }else{
                return response()->json([
                    "res" => false,
                    "mensaje" => "Password incorrecta, intentelo de nuevo"
                ]);
            }
        }else{
            return response()->json([
                "res" => false,
                "mensaje" => "Usuario no encontrado",
            ], 404);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "res" => true,
            "mensaje" => "Cierre de sesion exitoso",
        ], 200);
    }

    public function perfil(){
        return response()->json([
            "res" => true,
            "mensaje" => "Datos del perfil de usuario",
            "data" => auth()->user()
        ]);
    }
}
