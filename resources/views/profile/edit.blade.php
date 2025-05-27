<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festipass Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            // Jika ada kustomisasi tema Tailwind, bisa ditambahkan di sini
          }
        }
      }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-purple-600">FestiPass</a>
            <div>
                @auth
                    <a href="{{ route('profile.edit') }}" class="mr-4 text-gray-700 hover:text-purple-600">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-purple-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4 text-gray-700 hover:text-purple-600">Login</a>
                    <a href="{{ route('register.form') }}" class="text-gray-700 hover:text-purple-600">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

            @if(session('status'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block font-medium mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block font-medium mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telephone -->
                <div class="mb-4">
                    <label for="telephone" class="block font-medium mb-1">Telephone</label>
                    <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $user->telephone) }}"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('telephone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Language -->
                <div class="mb-4">
                    <label for="language" class="block font-medium mb-1">Language</label>
                    <input type="text" name="language" id="language" value="{{ old('language', $user->language) }}" required
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('language')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Type -->
                <div class="mb-6">
                    <label for="account_type" class="block font-medium mb-1">Account Type</label>
                    <select name="account_type" id="account_type" required
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="Regular User" {{ old('account_type', $user->account_type) == 'Regular User' ? 'selected' : '' }}>Regular User</option>
                        <option value="Organizer" {{ old('account_type', $user->account_type) == 'Organizer' ? 'selected' : '' }}>Organizer</option>
                    </select>
                    @error('account_type')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-blue-600 hover:from-purple-600 hover:to-blue-700 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    Update Profile
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner py-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} FestiPass. All rights reserved.
    </footer>
</body>
</html>
