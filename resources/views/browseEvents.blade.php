@extends('layouts.app')
@php
    // $authenticatedUserId = auth()->user()->id;
    $authenticatedUserId = 1; // Manually set the authenticated user ID for testing
@endphp
@section('content')
<div class="container">
    <h1>Browse Events</h1>
    @if ($events->isEmpty())
        <p>No events found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Created by</th>
                    <th>Registered Users</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->createdByUser->name }}</td>
                    <td>{{ $event->registrations->count()}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            @php
                                $registration = \App\Models\Registration::where('event_id', $event->id)
                                                                         ->where('user_id', $authenticatedUserId)
                                                                         ->first();
                            @endphp
                            @if ($registration)
                                <form action="{{ route('registration.delete', [$event->id, $authenticatedUserId]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Unregister</button>
                                </form>
                            @else
                                <form action="{{ route('registration.create', [$event->id, $authenticatedUserId]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
