<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Sample as Sample;
use DB;

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
        if ($request->user()->userType != 'analyst') {
            return redirect('/');
        }

        $sampledata = DB::table('samples AS s')
                        ->select('s.laboratoryCode', 's.dueDate', 's.sampleCollection' )
                        ->leftJoin('sample__tests AS st','st.sampleCode','=','s.sampleId')
                        ->leftJoin('parameters AS p', 'p.parameterId', '=', 'st.parameters')
                        ->leftJoin('stations AS sta', 'p.station', '=', 'sta.stationid')
                        ->where('dueDate','<',date("Y-m-d",strtotime("+5 day")))
                        ->where('st.status','=', 'In Progress')
                        ->groupBy('s.laboratoryCode', 's.dueDate','s.sampleCollection')
                        ->distinct()
                        ->get();

        View::share('sampledata', $sampledata);
        return $next($request);
    }
}
