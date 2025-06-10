import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import api from '../api';
import '../styles/EventForm.css';


function EventForm({ isEdit = false }) {
  const [formData, setFormData] = useState({
    title: '',
    description: '',
    category: '',
    location: '',
    capacity: '',
    start_datetime: '',
    end_datetime: '',
    status: 'pending',
  });

  const navigate = useNavigate();
  const { id } = useParams();

  useEffect(() => {
    if (isEdit && id) {
      api.get(`/events/${id}`)
        .then(res => {

          setFormData(res.data);
        })
        .catch(err => console.error('Error loading event:', err));
    }
  }, [id, isEdit]);

  const handleChange = e => {

    if (e.target.name === 'status') return;

    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();

    try {
      if (!isEdit) {

        await api.post('/events', { ...formData, status: 'pending' });
      } else {

        await api.put(`/events/${id}`, formData);
      }

      navigate('/events');
    } catch (err) {
      console.error('Error saving event:', err);
      alert('Something went wrong.');
    }


  };

  return (

    <div className="container form-wrapper">

      <h2>{isEdit ? 'Edit Event' : 'Create Event'}</h2>

      <form onSubmit={handleSubmit}>
        {[
          { name: 'title', label: 'Title', type: 'text' },
          { name: 'description', label: 'Description', type: 'textarea' },
          { name: 'category', label: 'Category', type: 'text' },
          { name: 'location', label: 'Location', type: 'text' },
          { name: 'capacity', label: 'Capacity', type: 'number' },
          { name: 'start_datetime', label: 'Start Date & Time', type: 'datetime-local' },
          { name: 'end_datetime', label: 'End Date & Time', type: 'datetime-local' },
        ].map(({ name, label, type }) => (
          <div className="mb-3" key={name}>
            <label htmlFor={name} className="form-label">{label}</label>
            {type === 'textarea' ? (
              <textarea
                className="form-control"
                name={name}
                value={formData[name]}
                onChange={handleChange}
                required
              />
            ) : (
              <input
                className="form-control"
                type={type}
                name={name}
                value={formData[name]}
                onChange={handleChange}
                required
              />
            )}
          </div>
        ))}

       
        {isEdit && (
          <div className="mb-3">
            <label htmlFor="status" className="form-label">Status</label>
            <input
              className="form-control"
              type="text"
              name="status"
              value={formData.status || 'pending'}
              disabled
            />
          </div>
        )}

        <button className="btn btn-success w-100" type="submit">
          {isEdit ? 'Update' : 'Save'}
        </button>
      </form>
    </div>

  );

}

export default EventForm;
