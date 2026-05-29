<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $tokenRecibido = $request->bearerToken();

        if ($tokenRecibido) {
            $tokenEncontrado = PersonalAccessToken::findToken($tokenRecibido);

            if ($tokenEncontrado) {
                return response()->json([
                    'mensaje' => 'El usuario ya está logueado'
                ]);
            }
        }

        $user = User::where('name', $request->name)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'mensaje' => 'Nombre o contraseña incorrectos'
            ], 401);
        }

        $token = $user->createToken('token_api')->plainTextToken;

        return response()->json([
            'mensaje' => 'Login correcto',
            'token' => $token
        ]);
    }

    public function usuario(Request $request)
    {
        return response()->json([
            'usuario' => $request->get('usuario_logueado')
        ]);
    }

    public function logout(Request $request)
    {
        $tokenRecibido = $request->bearerToken();

        $tokenEncontrado = PersonalAccessToken::findToken($tokenRecibido);

        if (!$tokenEncontrado) {
            return response()->json([
                'mensaje' => 'Token no válido'
            ], 401);
        }

        $tokenEncontrado->delete();

        return response()->json([
            'mensaje' => 'Sesión cerrada correctamente'
        ]);
    }
}
