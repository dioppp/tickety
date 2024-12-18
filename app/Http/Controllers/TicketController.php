<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
            ['name' => $event->event_name, 'url' => route('event.show', $event->id)],
            ['name' => 'Tambah Jenis Tiket', 'url' => route('ticket.create', $event->id)],
        ];

        return view('pages.tickets.create', compact('breadcrumbs', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();

        $event = Event::find($data['event_id']);
        $event->tickets()->createMany($data['tickets']);

        return redirect()->route('event.show', $event->id)->with('success', 'Jenis tiket berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => route('event.index')],
            ['name' => $ticket->event->event_name, 'url' => route('event.show', $ticket->event->id)],
            ['name' => 'Ubah Jenis Tiket', 'url' => route('ticket.edit', $ticket->id)],
        ];

        return view('pages.tickets.edit', compact('breadcrumbs', 'ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());

        return redirect()->route('event.show', $ticket->event_id)->with('success', 'Jenis tiket berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('event.show', $ticket->event_id)->with('success', 'Jenis tiket berhasil dihapus');
    }
}
