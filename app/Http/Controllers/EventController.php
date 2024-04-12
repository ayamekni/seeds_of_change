<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
  
    class EventController extends Controller
    {
        public function showForm()
        {
            return view('createEvent');
        }
    
        public function showEvents()
        {
            $events = Event::all();
            return view('events', compact('events'));
        }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Create a new event instance
        $event = new Event();
        $event->title = $validatedData['title'];
        $event->date = $validatedData['date'];
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
    
        // Save the event to the database
        $event->save();
    
        // Redirect back to the form with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    // public function edit(Event $event)
    // {
    //     // Retrieve the event from the database and pass it to the view
    //     $event=Event::find($event);
    //     return view('updateEvent', compact('event'));
    // }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }


    public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('updateEvent', compact('event'));
}
}

































    
