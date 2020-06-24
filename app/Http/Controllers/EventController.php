<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sport;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();

        return view('events.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            '_sport_id' => 'required|exists:sports,id',
        ]);

        $event = new Event($request->all());
        $sport = Sport::find($request->get('_sport_id'));

        if ($sport === null) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['sport' => 'Keine Sportart mit dieser ID vorhanden.']);
        }


        $sport->events()->save($event);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $sports = Sport::all();

        return view('events.edit', compact('event', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            '_sport_id' => 'required|exists:sports,id',
        ]);

        $event->update($request->all());

        $event->sport()->associate($request->get('_sport_id'));

        $event->save();

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
