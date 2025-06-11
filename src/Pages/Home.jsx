import { Link } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

export default function Home() {
  return (
    <div className="container mt-5">
      <div className="bg-light p-5 rounded shadow-sm">
        <h2 className="display-5 fw-bold">Welcome to Findify</h2>
        <p className="lead">
          Browse and register for exciting free events. Your ticket with QR will be emailed to you.
        </p>
        <Link to="/events" className="btn btn-danger btn-lg mt-3">
          Browse Events
        </Link>
      </div>
    </div>
  );
}
