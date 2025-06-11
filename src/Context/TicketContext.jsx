// src/context/TicketContext.jsx
import { createContext, useState } from "react";

export const TicketContext = createContext();

export default function TicketProvider({ children }) {
  const [tickets, setTickets] = useState([]);

  const addTicket = (event) => {
    const newTicket = {
      id: Date.now(),
      eventTitle: event.title,
      date: event.date,
      status: "Confirmed",
      qrCodeUrl: `https://api.qrserver.com/v1/create-qr-code/?data=${event.title}-${event.date}&size=150x150`,
    };
    setTickets((prev) => [...prev, newTicket]);
  };

  return (
    <TicketContext.Provider value={{ tickets, addTicket }}>
      {children}
    </TicketContext.Provider>
  );
}
