<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
        ];
        $events = Event::all();

        return view('pages.events.index', compact('breadcrumbs', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
            ['name' => 'Buat Event', 'url' => route('event.create')],
        ];
        $categories = CategoryEnum::cases();

        return view('pages.events.create', compact('breadcrumbs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image') ? $request->file('image')->store('banners') : null;

        $tickets = isset($data['tickets']) ? (is_array($data['tickets']) ? $data['tickets'] : [$data['tickets']]) : [];
        $data = array_diff_key($data, array_flip(['tickets']));

        DB::transaction(function () use ($data, $tickets) {
            $event = Event::create($data);

            foreach ($tickets as $ticket) {
                $ticket['event_id'] = $event->id;
                Ticket::create($ticket);
            }
        });

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
            ['name' => $event->event_name, 'url' => route('event.show', $event->id)],
        ];
        $event = Event::with('tickets')->find($event->id);
        $tickets = $event->tickets;

        return view('pages.events.show', compact('breadcrumbs', 'event', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
            ['name' => $event->event_name, 'url' => route('event.show', $event->id)],
            ['name' => 'Ubah Event', 'url' => route('event.edit', $event->id)],
        ];
        $categories = CategoryEnum::cases();

        return view('pages.events.edit', compact('breadcrumbs', 'event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        // dd($request->validated());
        $event->update($request->validated());

        return redirect()->route('event.show', $event->id)->with('success', 'Detail event berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus');
    }
}
