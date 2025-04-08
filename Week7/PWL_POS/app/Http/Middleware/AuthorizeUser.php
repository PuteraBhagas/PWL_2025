<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = ''): Response
    {
        $user = $request->user();   // mengambil data user login
                                    //fungsi user() diambil dari UserModel
        if ($user->hasRole($role)) {// melakukan cek apkah punya role  
            return $next($request);
        }
       
        abort(403, 'Forbiden kamu tidak punya akses ke halaman ini'); // error jika tidak ada 
    }
}