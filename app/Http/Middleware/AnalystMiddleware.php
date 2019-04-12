<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Sample as Sample;

class AnalystMiddleware
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
        if ($request->user()->userType != 'administrator') {
            return redirect('/home');
        }

        $sampledata = Sample::where('dueDate','<',date("Y-m-d",strtotime("+5 day")))
                        ->orderBy('dueDate')
                        ->get();

        View::share('sampledata', $sampledata);
        return $next($request);
    }
}
