<!DOCTYPE html>
<html>
<head>
    <title>App Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">App Users</h1>
        <a href="{{ route('app_users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New User</a>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Gender</th>
                    <th class="p-3">Age</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->gender }}</td>
                        <td class="p-3">{{ $user->age }}</td>
                        <td class="p-3">{{ $user->role }}</td>
                        <td class="p-3">
                            <a href="{{ route('app_users.show', $user->id_user) }}" class="text-blue-500">View</a>
                            <a href="{{ route('app_users.edit', $user->id_user) }}" class="text-yellow-500 ml-2">Edit</a>
                            <form action="{{ route('app_users.destroy', $user->id_user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>