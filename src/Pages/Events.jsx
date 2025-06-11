import React, { useEffect, useState } from 'react';
import axios from '../api/axiosInstance';

export default function Events() {
  const [events, setEvents] = useState([]);

  useEffect(() => {
    axios.get('/events')
      .then(res => setEvents(res.data))
      .catch(err => console.error(err));
  }, []);

  return (
    <div className="container mt-5">
      <h2>🎉 Available Events</h2>
      <ul className="list-group">
        {events.map(event => (
          <li key={event.id} className="list-group-item">
            <h5>{event.title}</h5>
            <p>{event.description}</p>
            <small>{event.date}</small>
          </li>
        ))}
      </ul>
    </div>
  );
}
