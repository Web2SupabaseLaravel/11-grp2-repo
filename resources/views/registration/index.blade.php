<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Registrations</title>
    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            background-color: #fff;
        }

        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-confirmed {
            color: green;
            font-weight: bold;
        }

        .status-cancelled {
            color: red;
            font-weight: bold;
        }

        .status-transferred {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>All Registrations</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Event ID</th>
                <th>Status</th>
                <th>Datetime</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $reg)
                <tr>
                    <td>{{ $reg->id }}</td>
                    <td>{{ $reg->user_id }}</td>
                    <td>{{ $reg->event_id }}</td>
                    <td class="status-{{ strtolower($reg->status) }}">{{ $reg->status }}</td>
                    <td>{{ $reg->registration_datetime }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
