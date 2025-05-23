<!-- resources/views/events/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Event Details</h1>

    <table class="table table-bordered">
        <tr><th>Title</th><td>{{ $event->title }}</td></tr>
        <tr><th>Description</th><td>{{ $event->description }}</td></tr>
        <tr><th>Location</th><td>{{ $event->location }}</td></tr>
        <tr><th>Start Date and Time</th><td>{{ $event->start_datetime }}</td></tr>
        <tr><th>End Date and Time</th><td>{{ $event->end_datetime }}</td></tr>
        <tr><th>Capacity</th><td>{{ $event->capacity }}</td></tr>
        <tr><th>Category</th><td>{{ $event->category }}</td></tr>
        <tr><th>Status</th><td>{{ $event->status }}</td></tr>
        <tr><th>Created At</th><td>{{ $event->created_at }}</td></tr>
        <tr><th>Updated At</th><td>{{ $event->updated_at }}</td></tr>
    </table>

    <a href="{{ route('events.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
