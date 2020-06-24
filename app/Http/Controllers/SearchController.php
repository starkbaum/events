<?php

namespace App\Http\Controllers;

use App\Sport;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $events = Event::where('title', 'like', '%' . $search . '%')
                        ->orWhere('location', 'like', '%' . $search . '%')
                        ->orWhere('organizer', 'like', '%' . $search . '%')
                        ->get();

        $sports = Sport::all();

        return view('home', compact(['events', 'sports']));
    }
}
