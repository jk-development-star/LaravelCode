<?php
namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateAdmin extends Middleware
{
    protected function redirectTo($request)
    {
        if(!$request->expectsJson()) {
            return route('admin_login');
        }
    }
}