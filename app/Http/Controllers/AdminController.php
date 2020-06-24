<?php

namespace App\Http\Controllers;

use App\User;
use App\Sport;
use App\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::count();
        $sportsCount = Sport::count();
        $eventsCount = Event::count();

        return view('admin.index', compact(['userCount', 'sportsCount', 'eventsCount']));
    }
}
