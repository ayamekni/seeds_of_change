@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Events</h1>
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
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Update</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <button class="btn btn-primary">
        <a href="{{ route('events.form') }}" style="color: inherit; text-decoration: none;">Create Event</a>
    </button>
</div>
@endsection


