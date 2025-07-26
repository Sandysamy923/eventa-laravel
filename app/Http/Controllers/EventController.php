<?php

namespace App\Http\Controllers;

use App\Models\Booking; 
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event()
    {
        return view('events');
    }

    
    public function showEvents()
{
    $events = Event::all(); 
    return view('events', compact('events'));
}

    public function contactus()
    {
        return view('contact');
    }

    public function index()
{
    $events = Event::all();
    return view('admin.index', compact('events'));
}

public function create()
{
    return view('admin.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'location' => 'nullable',
        'event_date' => 'nullable|date',
        'event_price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('events', 'public');
    }

    Event::create($data);

    return redirect()->route('events.index')->with('success', 'Event created!');
}

public function edit(Event $event)
{
    return view('admin.edit', compact('event'));
}

public function update(Request $request, Event $event)
{
    $data = $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'location' => 'nullable',
        'event_date' => 'nullable|date',
        'event_price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $data['image'] = $request->file('image')->store('events', 'public');
    }

    $event->update($data);

    return redirect()->route('events.index')->with('success', 'Event updated!');
}

public function destroy(Event $event)
{
    if ($event->image) {
        Storage::disk('public')->delete($event->image);
    }
    $event->delete();
    return redirect()->route('events.index')->with('success', 'Event deleted!');
}
 public function indexx()
{
    $events = Event::all();
    return view('home', compact('events'));
}

 public function dashboard(Request $request)
{
    if ($request->query('success') && $request->query('event_id')) {
        $eventId = $request->query('event_id');
        $userId = auth()->id();

        $alreadyBooked = Booking::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();

        if (!$alreadyBooked) {
            Booking::create([
                'user_id' => $userId,
                'event_id' => $eventId,
            ]);
        }
    }

    $bookings = Booking::with('event')
        ->where('user_id', auth()->id())
        ->get();

    return view('dashboard', compact('bookings'));
}



}


