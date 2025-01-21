<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableCsrfMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Bỏ qua CSRF validation cho API
        if ($request->is('api/*')) {
            return $next($request);
        }

        // Kiểm tra CSRF thông thường nếu không phải API
        return app(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class)->handle($request, $next);

    }
}
