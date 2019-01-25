<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class list_event_and_idea extends Controller
{
    public function display_idea()
    {
        $event = \App\Event::where('Id_state', '1')->get();
    
        return view('List_idea', [
            'event' => $event
        ]);
    }

    public function display_event()
    {
        $event = \App\Event::where('Id_state', '2')->get();
    
        return view('List_event', [
            'event' => $event
        ]);
    }
}