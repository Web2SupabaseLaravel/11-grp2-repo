import { useState, useEffect } from "react";
import axios from "axios";
import { toast } from "react-toastify";
import Select from "react-select";

export default function Register() {
  const [userId, setUserId] = useState("");
  const [events, setEvents] = useState([]);
  const [tickets, setTickets] = useState([]);
  const [selectedEvent, setSelectedEvent] = useState(null);
  const [selectedTicket, setSelectedTicket] = useState("");

  useEffect(() => {
    axios.get("http://127.0.0.1:8000/api/events")
      .then(res => setEvents(res.data))
      .catch(() => toast.error("❌ Failed to load events"));
  }, []);

  useEffect(() => {
    if (selectedEvent) {
      axios.get(`http://127.0.0.1:8000/api/tickets/by-event/${selectedEvent.value}`)
        .then(res => setTickets(res.data))
        .catch(() => toast.error("❌ Failed to load tickets"));
    }
  }, [selectedEvent]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await axios.post("http://127.0.0.1:8000/api/registrations", {
        user_id: userId,
        event_id: selectedEvent.value,
        ticket_type_id: selectedTicket,
        status: "Confirmed"
      });
      toast.success("✅ Registered successfully!");
      setUserId("");
      setSelectedEvent(null);
      setSelectedTicket("");
    } catch (error) {
      toast.error("❌ Registration failed.");
    }
  };

  const eventOptions = events.map(event => ({
    value: event.id,
    label: event.title
  }));

  const formatEventOption = ({ label }) => (
    <div>{label}</div>
  );

  return (
    <div className="container mt-5">
      <div className="card shadow-sm p-5 mx-auto" style={{
        maxWidth: "600px",
        background: "#fff",
        borderRadius: "16px"
      }}>
        <h3 className="text-center mb-4" style={{ color: "#3E5879" }}>
          📇 Register for an Event
        </h3>

        <form onSubmit={handleSubmit}>
          <div style={{ marginBottom: "2rem" }}>
            <label className="form-label" style={{ color: "#3E5879", fontWeight: "bold" }}>User ID</label>
            <input
              type="number"
              className="form-control"
              value={userId}
              onChange={(e) => setUserId(e.target.value)}
              placeholder="Enter your user ID"
              required
            />
          </div>

          <div style={{ marginBottom: "2rem" }}>
            <label className="form-label" style={{ color: "#3E5879", fontWeight: "bold" }}>Select Event</label>
            <Select
              options={eventOptions}
              getOptionLabel={formatEventOption}
              onChange={(option) => setSelectedEvent(option)}
              value={selectedEvent}
              placeholder="-- Choose an Event --"
              styles={{
                control: (base) => ({
                  ...base,
                  borderColor: "#ced4da",
                  boxShadow: "none",
                  minHeight: 50,
                  fontSize: 16
                })
              }}
            />
          </div>

          <div style={{ marginBottom: "2rem" }}>
            <label className="form-label" style={{ color: "#3E5879", fontWeight: "bold" }}>Select Ticket</label>
            <select
              className="form-select"
              value={selectedTicket}
              onChange={(e) => setSelectedTicket(e.target.value)}
              required
            >
              <option value="">-- Choose Ticket Type --</option>
              {tickets.map((ticket) => (
                <option key={ticket.id} value={ticket.id}>
                  {ticket.name_ticket} - ${ticket.price}
                </option>
              ))}
            </select>
          </div>

          <button type="submit" className="btn btn-primary w-100" style={{ fontWeight: "bold", fontSize: "18px" }}>
            Submit
          </button>
        </form>
      </div>
    </div>
  );
}
