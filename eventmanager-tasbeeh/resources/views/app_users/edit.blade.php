<!DOCTYPE html>
<html>
<head>
    <title>Edit App User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('app_users.update', $appUser->id_user) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name', $appUser->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded p-2" value="{{ old('email', $appUser->email) }}" required>
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-gray-700">Gender</label>
                <select name="gender" id="gender" class="w-full border rounded p-2" required>
                    <option value="male" {{ old('gender', $appUser->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $appUser->gender) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="age" class="block text-gray-700">Age</label>
                <input type="number" name="age" id="age" class="w-full border rounded p-2" value="{{ old('age', $appUser->age) }}" required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role</label>
                <select name="role" id="role" class="w-full border rounded p-2" required>
                    <option value="Attendee" {{ old('role', $appUser->role) == 'Attendee' ? 'selected' : '' }}>Attendee</option>
                    <option value="Organizer" {{ old('role', $appUser->role) == 'Organizer' ? 'selected' : '' }}>Organizer</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('app_users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </form>
    </div>
</body>
</html>