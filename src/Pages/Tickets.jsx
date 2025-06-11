import { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";

const dummyTickets = [
  {
    id: 1,
    eventTitle: "Tech Conference 2025",
    date: "2025-08-10",
    status: "Confirmed",
    qrCodeUrl: "https://api.qrserver.com/v1/create-qr-code/?data=Ticket#1&size=150x150"
  },
  {
    id: 2,
    eventTitle: "Startup Pitch Night",
    date: "2025-09-05",
    status: "Confirmed",
    qrCodeUrl: "https://api.qrserver.com/v1/create-qr-code/?data=Ticket#2&size=150x150"
  }
];

export default function Tickets() {
  const [showQR, setShowQR] = useState(null);

  return (
    <div className="container mt-5">
      <h2 className="mb-4">Your Tickets</h2>
      <div className="row">
        {dummyTickets.map((ticket) => (
          <div className="col-md-6 mb-4" key={ticket.id}>
            <div className="card h-100 shadow-sm">
              <div className="card-body">
                <h5 className="card-title">{ticket.eventTitle}</h5>
                <p className="card-text"><strong>Date:</strong> {ticket.date}</p>
                <p className="card-text"><strong>Status:</strong> {ticket.status}</p>
                <button
                  className="btn btn-outline-primary"
                  onClick={() => setShowQR(ticket.id === showQR ? null : ticket.id)}
                >
                  {showQR === ticket.id ? "Hide QR" : "Show QR Code"}
                </button>
                {showQR === ticket.id && (
                  <div className="mt-3">
                    <img src={ticket.qrCodeUrl} alt="QR Code" />
                  </div>
                )}
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
