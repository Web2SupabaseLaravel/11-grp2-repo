import { useState, useEffect } from "react";
import axios from "axios";
import "bootstrap/dist/css/bootstrap.min.css";
import { toast } from "react-toastify";

export default function ManageInventory() {
  const [tickets, setTickets] = useState([]);
  const [form, setForm] = useState({
    name_ticket: "",
    price: "",
    quantity: "",
    description: ""
  });

  const eventId = 13; 

  useEffect(() => {
    fetchTickets();
  }, []);

  const fetchTickets = () => {
    axios.get(`http://127.0.0.1:8000/api/tickets/by-event/${eventId}`)
      .then(res => setTickets(res.data))
      .catch(() => toast.error("❌ Failed to load tickets"));
  };

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const newTicket = {
      ...form,
      event_id: eventId
    };

axios.post("http://127.0.0.1:8000/api/ticket_types", newTicket)
      .then(() => {
        toast.success("✅ Ticket added");
        fetchTickets();
        setForm({ name_ticket: "", price: "", quantity: "", description: "" });
      })
      .catch(() => toast.error("❌ Failed to add ticket"));
  };

  const handleDelete = (id) => {
    if (!window.confirm("Are you sure you want to delete this ticket?")) return;

    axios.delete(`http://127.0.0.1:8000/api/registrations/${id}`)
      .then(() => {
        toast.success("🗑️ Ticket deleted");
        fetchTickets();
      })
      .catch(() => toast.error("❌ Delete failed"));
  };

  return (
    <div className="container mt-5">
      <h2 className="mb-4">Manage Ticket Inventory</h2>

      {/* Form to Add Ticket */}
      <form onSubmit={handleSubmit} className="mb-4 border rounded p-4 bg-light shadow-sm">
        <div className="mb-3">
          <label className="form-label">Ticket Name</label>
          <input type="text" name="name_ticket" value={form.name_ticket} onChange={handleChange} className="form-control" required />
        </div>
        <div className="mb-3">
          <label className="form-label">Price</label>
          <input type="number" name="price" value={form.price} onChange={handleChange} className="form-control" required />
        </div>
        <div className="mb-3">
          <label className="form-label">Quantity</label>
          <input type="number" name="quantity" value={form.quantity} onChange={handleChange} className="form-control" required />
        </div>
        <div className="mb-3">
          <label className="form-label">Description</label>
          <textarea name="description" value={form.description} onChange={handleChange} className="form-control" />
        </div>
        <button type="submit" className="btn btn-success">Add Ticket</button>
      </form>

      {/* Table of Tickets */}
      <h4>Ticket List</h4>
      {tickets.length === 0 ? (
        <p className="text-muted">No tickets found.</p>
      ) : (
        <table className="table table-bordered table-striped">
          <thead className="table-primary">
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {tickets.map((ticket) => (
              <tr key={ticket.id}>
                <td>{ticket.name_ticket}</td>
                <td>${ticket.price}</td>
                <td>{ticket.quantity}</td>
                <td>{ticket.description}</td>
                <td>
                  <button className="btn btn-danger btn-sm" onClick={() => handleDelete(ticket.id)}>Delete</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}
