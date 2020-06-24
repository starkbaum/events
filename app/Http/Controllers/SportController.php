<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();

        return view('sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Sport::getColors();


        return view('sports.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (!Sport::colorIsValid($request->get('color'))) {

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['color' => 'Bitte wählen Sie eine der vorgegebenen Farben aus.']);
        }

        Sport::create($request->all());

        return redirect()->route('admin.sports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        $events = $sport->events;
        $sports = Sport::all();

        return view('home', compact('events', 'sports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        $colors = Sport::getColors();


        return view('sports.edit', compact(['sport', 'colors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        if (!Sport::colorIsValid($request->get('color'))) {

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['color' => 'Bitte wählen Sie eine der vorgegebenen Farben aus.']);
        }

        $sport->update($request->all());

        return redirect()->route('admin.sports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()->route('admin.sports.index');
    }
}
