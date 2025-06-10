import { Routes, Route, Navigate } from 'react-router-dom';
import EventsList from './components/EventsList';
import EventForm from './components/EventForm';

function App() {
  return (
    <Routes>
      <Route path="/" element={<Navigate to="/events" />} />

      <Route path="/events" element={<EventsList />} />
      <Route path="/events/create" element={<EventForm />} />
      <Route path="/events/edit/:id" element={<EventForm isEdit />} />
    </Routes>
  );
}

export default App;
