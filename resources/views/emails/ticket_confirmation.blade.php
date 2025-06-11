<!DOCTYPE html>
<html>
<body>
  <h2>Welcome {{ $user->name }}</h2>

<p>You've successfully registered for: <strong>{{ $event->title }}</strong></p>
<p>Ticket Type: {{ $ticket->name_ticket }} - ${{ $ticket->price }}</p>

<h3>Your Ticket QR Code:</h3>
<div>
    {!! $qrCode !!}
</div>

</body>
</html>
