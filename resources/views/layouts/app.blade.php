<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'FestiPass')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
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
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>
    <footer class="bg-white shadow-inner py-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} FestiPass. All rights reserved.
    </footer>
</body>
</html>
