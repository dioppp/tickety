<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryEnum::cases();

        return view('pages.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image') ? $request->file('image')->store('banners') : null;

        $tickets = isset($data['tickets']) ? (is_array($data['tickets']) ? $data['tickets'] : [$data['tickets']]) : [];

        DB::transaction(function () use ($data, $tickets) {
            $event = Event::create($data);

            foreach ($tickets as $ticket) {
                $ticket['event_id'] = $event->id;
                Ticket::create($ticket);
            }
        });

        return redirect()->route('event.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::with('tickets')->find($event->id);
        $tickets = $event->tickets;

        return view('pages.events.show', compact('event', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
