<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Events History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .tab-active {
            border-bottom: 3px solid #667eea;
            color: #667eea;
            font-weight: 600;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 font-poppins">
<header class="bg-white shadow-sm border-b sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="text-3xl font-bold gradient-text">FestiPass</a>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="history.back()"
                   class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back
                </button>
            </div>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="text-left mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Events History</h1>
    </div>

    <div class="border-b border-gray-200 mb-8">
        <nav class="-mb-px flex space-x-8 overflow-x-auto">
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                My Profile
            </button>
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                Reviews
            </button>
            <button class="tab-active py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                Events History
            </button>
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                Help Center
            </button>
        </nav>
    </div>

    <!-- Carousel Content -->
    <div class="space-y-10">
        <!-- Carousel Row 1 -->
        <div class="overflow-x-auto pb-2">
            <div class="flex space-x-4 min-w-full">
                @for ($i = 0; $i < 4; $i++)
                <div class="min-w-[220px] bg-white rounded-xl shadow-md card-hover">
                    <img src="https://source.unsplash.com/300x200/?concert,{{ $i }}" alt="event" class="rounded-t-xl object-cover w-full h-36">
                    <div class="p-4">
                        <p class="text-sm text-gray-500 mb-1">NOV 0{{ $i+1 }}</p>
                        <h3 class="text-lg font-semibold mb-1">
                            @switch($i)
                                @case(0) Panic! at the Disco @break
                                @case(1) Hamilton the Musical @break
                                @case(2) Anastasia the Musical @break
                                @default AI Abdadi Seminar
                            @endswitch
                        </h3>
                        <p class="text-sm text-gray-600">Status: {{ $i === 3 ? 'Upcoming' : 'Finished' }}</p>
                        <p class="text-sm text-gray-500">
                            📍
                            @switch($i)
                                @case(0) The Icon, BSD @break
                                @case(1) Ciputra Artpreneur @break
                                @case(2) Intercon, Pkl Indah @break
                                @default Online
                            @endswitch
                        </p>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Carousel Row 2 -->
        <div class="overflow-x-auto pb-2">
            <div class="flex space-x-4 min-w-full">
                @for ($i = 0; $i < 4; $i++)
                <div class="min-w-[220px] bg-white rounded-xl shadow-md card-hover">
                    <img src="https://source.unsplash.com/300x200/?music,event,{{ $i+4 }}" alt="event" class="rounded-t-xl object-cover w-full h-36">
                    <div class="p-4">
                        <p class="text-sm text-gray-500 mb-1">NOV 1{{ $i }}</p>
                        <h3 class="text-lg font-semibold mb-1">
                            @switch($i)
                                @case(0) Panic! at the Disco @break
                                @case(1) Hamilton the Musical @break
                                @case(2) Anastasia the Musical @break
                                @default AI Abdadi Seminar
                            @endswitch
                        </h3>
                        <p class="text-sm text-gray-600">Status: {{ $i === 3 ? 'Upcoming' : 'Finished' }}</p>
                        <p class="text-sm text-gray-500">
                            📍
                            @switch($i)
                                @case(0) The Icon, BSD @break
                                @case(1) Ciputra Artpreneur @break
                                @case(2) Intercon, Pkl Indah @break
                                @default Online
                            @endswitch
                        </p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</main>
</body>
</html>
