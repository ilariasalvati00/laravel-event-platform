<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Tag;

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
        return view("admin.events.index", compact("events"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.events.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $dati = $request->validated();
        
        $nuovoevento = new Event();
        $nuovoevento->name = $dati['name'];
        $nuovoevento->date = $dati['date'];
        $nuovoevento->user_id = Auth::id();
        $nuovoevento->available_tickets = $dati['tickets'];
        $nuovoevento->save();
        foreach ($dati["tags"] as $tag_id){
            $nuovoevento->tags()->attach($tag_id);
        }

        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.edit" , compact("event", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $dati = $request->validated();
        
        $event->name = $dati['name'];
        $event->date = $dati['date'];
        $event->user_id = Auth::id();
        $event->available_tickets = $dati['tickets'];
        $event->save();
        $event->tags()->detach();
        foreach ($dati["tags"] as $tag_id){
            $event->tags()->attach($tag_id);
        }

        return redirect()->route("admin.events.show", $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("admin.events.index");
    }
}
