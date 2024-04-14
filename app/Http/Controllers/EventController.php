<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

  
    class EventController extends Controller
    {
        public function showForm()
        {
            return view('createEvent');
        }
    
        // public function showEvents()
        // {
        //     $events = Event::all();
        //     return view('events', compact('events'));
        // }
        public function manage()
        {
            // Retrieve all events along with the user who created each event
            // $events = Event::where('created_by', Auth::id())->get();
            $events = Event::where('created_by', 1)->get();
            // Pass the retrieved events to the view
            return view('ManageEvents', ['events' => $events]);
        }
        
        public function browse()
        {
            // Retrieve all events along with the user who created each event
            $events = Event::with(['createdByUser','registrations'])->get();
            return view('browseEvents', compact('events'));
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
        // $event->created_by = Auth::id(); // Set the created_by column to the ID of the authenticated user
        $event->created_by = 1; // Manually set the authenticated user ID for testing
    
        // Save the event to the database
        $event->save();
    
        // Redirect back to the form with a success message
        return redirect()->route('events.manage')->with('success', 'Event created successfully!');
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.manage')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.manage')->with('success', 'Event deleted successfully!');
    }


    public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('updateEvent', compact('event'));
}

}

































    
