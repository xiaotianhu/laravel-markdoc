<?php 
namespace Xiaotianhu\Markdoc\Middleware;

class MarkdocMiddleware{

    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if(config('markdoc.enable_on_debug') == true && env('APP_DEBUG') == false){
            return abort(404);
        }

        return $next($request);
    }

}

