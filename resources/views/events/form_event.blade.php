@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
        color: #2c3e50;
    }
    .form-label {
        font-weight: 600;
        color: #34495e;
        display: block;
        margin-bottom: 8px;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1.5px solid #ced4da;
        padding: 10px 14px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }
    .form-control:focus, .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 6px #a3d2fc;
        outline: none;
    }
    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }
    .btn-success {
        background-color: #27ae60;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }
    .btn-success:hover {
        background-color: #219150;
    }
    .btn-secondary {
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 8px;
        border: 1.5px solid #7f8c8d;
        background-color: #ecf0f1;
        color: #34495e;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .btn-secondary:hover {
        background-color: #bdc3c7;
        color: #2c3e50;
    }
    .alert-danger ul {
        margin-bottom: 0;
    }
    @media (max-width: 576px) {
        .form-container {
            padding: 20px 20px;
        }
        .btn-group {
            flex-direction: column;
            gap: 12px;
        }
        .btn-success, .btn-secondary {
            width: 100%;
            padding: 12px 0;
            font-size: 1rem;
        }
    }
</style>

<div class="form-container">
    <h2>{{ isset($event) ? 'Edit Event' : 'Add New Event' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}" method="POST" novalidate>
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $event->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
            <select name="category" id="category" class="form-select" required>
                <option value="">Select Category</option>
                <option value="conference" {{ old('category', $event->category ?? '') == 'conference' ? 'selected' : '' }}>Conference</option>
                <option value="meetup" {{ old('category', $event->category ?? '') == 'meetup' ? 'selected' : '' }}>Meetup</option>
                <option value="workshop" {{ old('category', $event->category ?? '') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="webinar" {{ old('category', $event->category ?? '') == 'webinar' ? 'selected' : '' }}>Webinar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity <span class="text-danger">*</span></label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $event->capacity ?? '') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="start_datetime" class="form-label">Start Date & Time <span class="text-danger">*</span></label>
            <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control" value="{{ old('start_datetime', isset($event) ? \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="mb-3">
            <label for="end_datetime" class="form-label">End Date & Time <span class="text-danger">*</span></label>
            <input type="datetime-local" name="end_datetime" id="end_datetime" class="form-control" value="{{ old('end_datetime', isset($event) ? \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        {{-- عرض حقل الحالة فقط للمشرفين --}}
        @auth
            @if(auth()->user()->is_admin)
                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">Select Status</option>
                        <option value="approved" {{ old('status', $event->status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ old('status', $event->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="rejected" {{ old('status', $event->status ?? '') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
            @endif
        @endauth

        <div class="btn-group">
            <a href="{{ route('event.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">{{ isset($event) ? 'Update' : 'Save' }}</button>
        </div>
    </form>
</div>
@endsection
