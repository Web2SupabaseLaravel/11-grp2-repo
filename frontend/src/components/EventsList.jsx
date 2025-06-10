import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../api';
import 'bootstrap/dist/css/bootstrap.min.css';
 import '../styles/EventList.css'

function EventsList() {
  const [events, setEvents] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    api.get('/events')
      .then(response => setEvents(response.data))
      .catch(error => console.error('Error fetching events:', error));
  }, []);

  const handleEdit = (id) => navigate(`/events/edit/${id}`);

  const handleDelete = async (id) => {
    if (window.confirm('Are you sure you want to delete this event?')) {
      try {
        await api.delete(`/events/${id}`);
        setEvents(events.filter(event => event.id !== id));
      } catch (error) {
        console.error('Error deleting event:', error);
      }
    }
  };

  return (
    <div className="container mt-5">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h2 className="title">All Events</h2>
        <button
          className="btn custom-add"
          onClick={() => navigate('/events/create')}
        >
          Add New Event +
        </button>
      </div>

      {events.length === 0 ? (
        <div className="text-center text-muted">No events found.</div>
      ) : (
        <div className="table-responsive">
          <table className="table table-bordered table-hover align-middle text-center">
            <thead className="table-light">
              <tr>
                <th>ID</th>
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
              {events.map(event => (
                <tr key={event.id}>
                  <td>{event.id}</td>
                  <td>{event.title}</td>
                  <td>{event.description}</td>
                  <td>{event.category}</td>
                  <td>{event.location}</td>
                  <td>{event.capacity}</td>
                  <td>{new Date(event.start_datetime).toLocaleString()}</td>
                  <td>{new Date(event.end_datetime).toLocaleString()}</td>
                  <td>{event.status}</td>
                  <td>
                    <div className="d-flex justify-content-center gap-2">
                      <button className="btn btn-sm custom-edit" onClick={() => handleEdit(event.id)}>Edit</button>
                      <button className="btn btn-sm custom-delete" onClick={() => handleDelete(event.id)}>Delete</button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      )}
    </div>
  );
}

export default EventsList;
