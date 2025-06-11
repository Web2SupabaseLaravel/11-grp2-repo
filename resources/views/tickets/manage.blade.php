<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Tickets</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        .form-group { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>🎟️ Manage Tickets for Event ID: {{ $event_id }}</h2>

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event_id }}">

        <div class="form-group">
            <input type="text" name="name_ticket" placeholder="Ticket Name" required>
        </div>
        <div class="form-group">
            <textarea name="description" placeholder="Description" required></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="price" placeholder="Price" required>
        </div>
        <div class="form-group">
            <input type="number" name="quantity" placeholder="Quantity" required>
        </div>
        <button type="submit">Add Ticket</button>
    </form>

    <h3>🗂️ Existing Tickets:</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Qty</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->name_ticket }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->quantity }}</td>
                    <td>
                        <form method="POST" action="{{ route('tickets.delete', $ticket->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
