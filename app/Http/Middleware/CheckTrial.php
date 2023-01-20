<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CheckTrial
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
        // if ($request->user()->subscribed('main') && !$request->user()->subscription('main')->onTrial()) {
        //     return $next($request);
        // }
    
        // return redirect()->route('plan.choose');

        $subscription = $request->user()->subscription('main');
    if ($subscription && Carbon::now()->greaterThan($subscription->trial_ends_at)) {
        // The user's trial period has ended
        // You can redirect the user to a subscription page or display a message
        return redirect()->route('plan.choose');
    }
    return $next($request);
}
    }

