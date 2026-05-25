<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidarId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next){
        $id = $request->route('id');
        
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['error' => 'ID inválido'], 400);
            }

        return $next($request);
    }
}
