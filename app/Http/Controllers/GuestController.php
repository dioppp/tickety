<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('index', compact('events'));
    }
}
