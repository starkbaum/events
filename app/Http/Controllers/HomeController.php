<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortBy('date');
        $sports = Sport::all();

        return view('home', compact(['events', 'sports']));
    }
}
