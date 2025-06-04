<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festipass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>

<body class="h-full">
    <nav class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="text-2xl font-bold text-purple-600" style="font-family: 'Poppins', sans-serif;">
            FestiPass
        </div>

        <!-- User Icon -->
        <div>
            <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-200">
                <!-- Heroicons user icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                </svg>
            </a>
        </div>
    </nav>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-purple-600 mb-2">Book Your Ticket</h1>
                <h2 class="text-xl font-semibold text-gray-800">{{ $event->title }}</h2>
            </div>
            <div class="mb-6">
                <img src="images/bernadya.jpeg" alt="Concert Image" class="rounded-lg shadow-md w-full object-cover">
            </div>
            <div class="space-y-4 mb-6">
                <!-- Regular Ticket -->
                <a href="/select-ticket/book"
                    class="flex items-center justify-between border rounded-xl p-4 hover:shadow-md transition duration-200 ring-2 ring-purple-500">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">
                        <!-- Image Icon -->
                        <img src="/path/to/icon.png" alt="icon" class="w-10 h-10 rounded-full" />

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold text-purple-600">Regular Early</div>
                            <div class="text-lg font-semibold text-gray-600">30/30 Sold</div>
                        </div>
                    </div>

                    <!-- Price and Arrow -->
                    <div class="flex items-center space-x-2">
                        <div class="text-purple-600 font-bold">Rp80.000</div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <a href="/select-ticket/book"
                    class="flex items-center justify-between border rounded-xl p-4 hover:shadow-md transition duration-200 ring-2 ring-cyan-300">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">
                        <!-- Image Icon -->
                        <img src="/path/to/icon.png" alt="icon" class="w-10 h-10 rounded-full" />

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold text-cyan-300">VIP Early</div>
                            <div class="text-lg font-semibold text-gray-600">20/20 Sold</div>
                        </div>
                    </div>

                    <!-- Price and Arrow -->
                    <div class="flex items-center space-x-2">
                        <div class="text-cyan-300 font-bold">Rp110.000</div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-cyan-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- VVIP Ticket -->
                <a href="/select-ticket/book"
                    class="flex items-center justify-between border rounded-xl p-4 hover:shadow-md transition duration-200 ring-2 ring-green-300">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">
                        <!-- Image Icon -->
                        <img src="/path/to/icon.png" alt="icon" class="w-10 h-10 rounded-full" />

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold text-green-300">Regular</div>
                            <div class="text-lg font-semibold text-gray-600">93/110 Sold</div>
                        </div>
                    </div>

                    <!-- Price and Arrow -->
                    <div class="flex items-center space-x-2">
                        <div class="text-green-300 font-bold">Rp90.000</div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <a href="/select-ticket/book"
                    class="flex items-center justify-between border rounded-xl p-4 hover:shadow-md transition duration-200 ring-2 ring-red-600">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">
                        <!-- Image Icon -->
                        <img src="/path/to/icon.png" alt="icon" class="w-10 h-10 rounded-full" />

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold text-red-600">VVIP</div>
                            <div class="text-lg font-semibold text-gray-600">0/13 Sold</div>
                        </div>
                    </div>

                    <!-- Price and Arrow -->
                    <div class="flex items-center space-x-2">
                        <div class="text-red-600 font-bold">Rp190.000</div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
