import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Navbar from "./components/Navbar";
import Home from "./Pages/Home";
import Events from "./Pages/Events";
import Tickets from "./Pages/Tickets";
import ManageInventory from "./Pages/ManageInventory";
import Register from './Pages/Register';

import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

export default function App() {
  return (
    <Router>
      <Navbar />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/events" element={<Events />} />
        <Route path="/tickets" element={<Tickets />} />
        <Route path="/manage" element={<ManageInventory />} />
        <Route path="/register" element={<Register />} />
      </Routes>

      <ToastContainer position="top-right" />
    </Router>
  );
}
