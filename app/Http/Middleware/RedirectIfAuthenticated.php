<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class RedirectIfAuthenticated
{
    /**
     * Authentication manager.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    private $auth;
    /**
     * Redirector.
     *
     * @var \Illuminate\Routing\Redirector
     */
    private $redirect;

    /**
     * Constructs a new redirect middleware for authentication.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @param \Illuminate\Routing\Redirector     $redirect
     */
    public function __construct(AuthFactory $auth, Rediretor $redirect)
    {
        $this->auth = $auth;
        $this->redirect = $redirect;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->check()) {
            return $this->redirect->to('/home');
        }

        return $next($request);
    }
}
