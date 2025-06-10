<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Concert Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="text-2xl font-extrabold text-purple-600">FestiPass</a>
            <div>
                <a href="#" class="text-purple-600 hover:text-purple-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4..."/>
                        <path d="M12 14c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-extrabold text-center text-purple-700 mb-2">Concert Details</h1>
        <h2 class="text-xl font-semibold text-center mb-6">SISFORIA : TGIF!</h2>

        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-6">
            <!-- Order Info -->
            <div class="space-y-1">
                <p class="font-semibold">Order No.1234567890</p>
                <div class="bg-purple-600 text-white p-4 rounded-md space-y-1 text-sm">
                    <p><strong>Purchased:</strong> Tue, 12 June 2025</p>
                    <p><strong>Payment Method:</strong> BCA</p>
                    <p><strong>Total Price:</strong> Rp600.000,00</p>
                    <p>(x3 Tickets)</p>
                    <p><strong>Your Seat:</strong><br>VIP A4<br>VIP A5<br>VIP A6</p>
                </div>
            </div>

            <!-- Event Details -->
            <div class="space-y-1">
                <h3 class="font-semibold">Event Details</h3>
                <div class="bg-purple-600 text-white p-4 rounded-md space-y-1 text-sm">
                    <p><strong>Date:</strong> Mon, 17 Aug 2025</p>
                    <p><strong>Venue:</strong> Departemen SI</p>
                    <p><strong>Lineup:</strong> Student of SI</p>
                    <p class="pt-2"><strong>Rundown:</strong></p>
                    <p>16.00 - 16.15 — Opening</p>
                    <p>16.15 - 16.55 — Song 1</p>
                    <p>16.55 - 17.35 — Song 2</p>
                    <p>17.35 - 18.15 — Song 3</p>
                    <p>18.15 - 18.30 — Closing</p>
                </div>
            </div>

            <!-- Feedback -->
            <div>
                <h3 class="font-semibold mb-2">Feedback</h3>
                <div class="flex space-x-1 mb-3">
                    @for($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 hover:text-yellow-400 cursor-pointer" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03..."/>
                        </svg>
                    @endfor
                </div>
                <textarea rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Write your feedback..."></textarea>
                <button class="mt-3 w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-md shadow-md">Post</button>
            </div>

            <!-- Report -->
            <div class="pt-4">
                <h3 class="font-semibold mb-2">Report</h3>
                <button class="w-full flex items-center justify-center bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-md hover:bg-purple-200 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    REPORT PROBLEM
                </button>
            </div>
        </div>
    </div>
</body>
</html>
