<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;
use session;
use Auth;
class Logintime
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
        if (Auth::check()) {
           $user = Auth::user(); // Assuming a relationship to the company model
            $company = Company::where('user_id', $user->id)->first();


            $elapsedTime = now()->diffInSeconds(session('login_time'));

            // Update login_duration in the database
            $company->login_duration += $elapsedTime;
            // Update login_duration in the database
         /*  $seconds =$user->login_duration + now()->diffInSeconds($user->last_login_at);
            
           // $company->last_active_at = now();
           $company->login_duration = $formattedDuration;*/
           
            $company->save();
            session(['login_time' => now()]);
        }
    
        return $next($request);
    }
}
