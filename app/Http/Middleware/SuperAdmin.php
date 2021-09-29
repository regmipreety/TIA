<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $superadmin = Auth::user()->user_group_id;
        if($superadmin!=4){
            echo "<h2>Sorry you do not have permission</h2>";
            echo "This action has been logged and notified to administrator";
            echo "<br /><a href=''>click here to go back</a>";
            exit();
        }else{
            return $next($request);

        }
    }
}
