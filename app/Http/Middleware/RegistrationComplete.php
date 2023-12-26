<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegistrationComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        //check if registration completed

        $user = $request->user();

        $school = $user->school;

        if(empty($school) || $school->reg_status != 'complete'){
            return redirect()->route('authenticate.createSchoolAccount');
        }


        return $next($request);
    }
}
