 <h1>All Registrations</h1>
<table border="1">
    <tr>
        <th>ID</th><th>User</th><th>Event</th><th>Status</th><th>Datetime</th>
    </tr>
    @foreach($registrations as $reg)
    <tr>
        <td>{{ $reg->id }}</td>
        <td>{{ $reg->user_id }}</td>
        <td>{{ $reg->event_id }}</td>
        <td>{{ $reg->status }}</td>
        <td>{{ $reg->registration_datetime }}</td>
    </tr>
    @endforeach
</table>

