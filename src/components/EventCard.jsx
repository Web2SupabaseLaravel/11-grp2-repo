import EventCard from './EventCard';

export default function EventList() {

  const events = [
    { id: 1, title: 'AI Bootcamp', date: '2025-07-01', location: 'Nablus' },
    { id: 2, title: 'Tech Conference', date: '2025-08-10', location: 'Gaza' },
  ];

  return (
    <div className="row">
      {events.map(event => (
        <div key={event.id} className="col-md-6 mb-4">
          <EventCard {...event} />
        </div>
      ))}
    </div>
  );
}
