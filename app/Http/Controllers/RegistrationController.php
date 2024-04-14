<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function create(int $event_id, int $user_id)
    {
        // Create a new registration instance
        $registration = new Registration();
        $registration->event_id = $event_id;
        $registration->user_id = $user_id;
        // Save the registration to the database
        $registration->save();
    
        // Redirect back to the events index with a success message
        return redirect()->route('events.browse')->with('success', 'Registered successfully!');
    }

    public function delete(int $event_id, int $user_id)
    {   
        $registration = Registration::where('event_id', $event_id)
                                    ->where('user_id', $user_id)
                                    ->firstOrFail();
        $registration->delete();
        return redirect()->route('events.browse')->with('success', 'Unregistered successfully!');
    }
    public function fetchEventsWithRegistrations()
    {
        // Fetch events along with the count of registered users for each event
        $events = Event::withCount('registrations')->get();

        // Pass the events data to the view
        return view('events.index', compact('events'));
    }

}
