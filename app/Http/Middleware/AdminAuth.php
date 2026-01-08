<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $user = User::find(Auth::id());
        if(!$user->isAdmin()) {
            abort(403, 'Chỉ Admin mới được truy cập');
        }
        if(!in_array($user->role()->name, $role)){
            abort(403, 'Trang này không thuộc quyền hạn của bạn.');
        }
        return $next($request);
    }
}
