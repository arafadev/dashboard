<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   protected function redirectTo($request)
    {
        
        if (!$request->expectsJson()) {
            if (Request::is('admin/*')) {
                return route('admin.login.form');
            } elseif (Request::is('provider/*')) {
                return route('provider.login.form');
            } elseif (Request::is('/*')) {
                return route('user.login.form');
            }
        }
    }
}
