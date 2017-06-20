<?php

namespace App\Http\Middleware;

use Closure;

class NivelUserMiddleware
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
        if(isset($request->user()->nivel)){
            if (($request->user()->nivel == 'alumno') != ($request->user()->id == '')) {
                return redirect()->route('frontend.index');
                // echo"
                //     <script>
                //         window.history.back(-1);
                //     </script>
                // ";
            }
        }
        return $next($request);
    }
}
