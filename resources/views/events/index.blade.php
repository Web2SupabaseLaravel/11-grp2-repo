@extends('layouts.app')

@section('content')
<style>
    table.table {
        border-collapse: collapse;
        width: 100%;
        font-size: 0.85rem;
    }
    table.table th, table.table td {
        padding: 8px 14px;
        vertical-align: middle;
        font-weight: 400;
    }
    table.table th {
        background-color: #f8f9fa;
        font-weight: 600;
        text-align: center;
        font-size: 1rem;
    }
    table.table tbody tr:hover {
        background-color: #f1f3f5;
    }
    .badge {
        font-size: 0.70rem;
    }
    .btn-sm {
        padding: 0.3rem 0.6rem;
        font-size: 0.85rem;
    }
    h1.display-4 {
        font-size: 3rem;
    }
    a.btn.btn-primary {
        font-size: 1.1rem;
        padding: 0.5rem 1.5rem;
    }


    .action-buttons {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 0.5rem;
        flex-wrap: nowrap;
    }
</style>

<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h1 class="display-4 fw-bold ms-3">Events List</h1>

        <a href="{{ route('event.create') }}" class="btn btn-primary fs-5 fw-bold px-4 py-2">
            + Add New Event
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @if($events->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Start DateTime</th>
                        <th>End DateTime</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ $event->category }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->capacity }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d H:i') }}</td>
                        <td>
                            <span class="badge {{ $event->status === 'approved' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No events available.</div>
    @endif
</div>
@endsection
