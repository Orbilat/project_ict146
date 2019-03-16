<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;

use Calendar;

class EventsController extends Controller
{
    public function index(){
    	$events = Event::get();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
        }
        
    	$calendar_details = Calendar::addEvents($event_list)->setCallbacks([
            ])->setOptions([
            'header' => [
                'right' => 'today listMonth prev,next ',
                'center' => '',
                // 'left' => 'listMonth',
            ],
            'defaultView' => 'month'
        ]);

        return view('clients.client_home', compact('calendar_details') );
    }
}