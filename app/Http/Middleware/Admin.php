<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Support\Facades\Auth;



class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {

    //     $adminRole = Auth::user()->roles()->pluck('name');
    //     if ($adminRole->contains('admin')) {
    //         return $next($request);
           
    //     }


    // }

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $adminRole = Auth::user()->roles()->pluck('name');
            if ($adminRole->contains('admin')) {
                return $next($request);
            }
        }
    
        // Handle unauthorized access here
        return redirect()->to('/');
    }
    



}
