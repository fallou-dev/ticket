<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SupportAuthenticated
{
     /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // if user is not admin take him to his dashboard
            if ( $user->hasRole('admin') ) {
                return redirect(url('admin_dashboard'));
            }

            // if user is not support take him to his dashboard
           else if ( $user->hasRole('user') ) {
                return redirect(url('dashboard'));
            }

            // allow admin to proceed with request
            else if ( $user->hasRole('support') ) {
                return $next($request);
            }
        }

        abort(403);  // permission denied error
    }
}
