<?php

// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return redirect('/'); // Rediriger si l'utilisateur n'est pas admin
        }

        return $next($request);
    }
}
