<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Registration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(5px);
        }

        .form-container h1 {
            margin-bottom: 25px;
            font-size: 28px;
            text-align: center;
            color: #222;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            margin-top: 18px;
            color: #444;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            box-sizing: border-box;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #007bff;
        }

        button {
            margin-top: 30px;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        small {
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create Registration</h1>
        <form action="{{ route('registration.store') }}" method="POST">
            @csrf

            <label for="user_id">User ID</label>
            <input type="number" id="user_id" name="user_id" placeholder="Enter user ID" required>

            <label for="event_id">Event ID</label>
            <input type="number" id="event_id" name="event_id" placeholder="Enter event ID" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">-- Select Status --</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Transferred">Transferred</option>
            </select>

            <label for="registration_datetime">Registration Datetime</label>
            <input type="text" name="registration_datetime" placeholder="YYYY-MM-DDTHH:MM" required>

            <button type="submit">Submit Registration</button>
        </form>
    </div>
</body>
</html>
