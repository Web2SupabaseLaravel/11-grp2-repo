<!DOCTYPE html>
<html>
<head>
    <title>View App User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">User Details</h1>
        <div class="bg-white p-6 rounded shadow-md">
            <p><strong>Name:</strong> {{ $appUser->name }}</p>
            <p><strong>Email:</strong> {{ $appUser->email }}</p>
            <p><strong>Gender:</strong> {{ $appUser->gender }}</p>
            <p><strong>Age:</strong> {{ $appUser->age }}</p>
            <p><strong>Role:</strong> {{ $appUser->role }}</p>
            <div class="mt-4">
                <a href="{{ route('app_users.edit', $appUser->id_user) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                <a href="{{ route('app_users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            </div>
        </div>
    </div>
</body>
</html>