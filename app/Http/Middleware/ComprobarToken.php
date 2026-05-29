<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class ComprobarToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokenRecibido = $request->bearerToken();

        if (!$tokenRecibido) {
            return response()->json([
                'mensaje' => 'No se ha enviado ningún token'
            ], 401);
        }

        $tokenEncontrado = PersonalAccessToken::findToken($tokenRecibido);

        if (!$tokenEncontrado) {
            return response()->json([
                'mensaje' => 'Token no válido'
            ], 401);
        }

        $usuario = $tokenEncontrado->tokenable;

        $request->attributes->add([
            'usuario_logueado' => $usuario
        ]);

        return $next($request);
    }
}
