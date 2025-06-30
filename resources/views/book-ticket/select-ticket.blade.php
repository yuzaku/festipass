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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Custom icons styling */
        .icon-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Decorative elements */
        .decorative-icon {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 50%, #4facfe 100%);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hero-pattern {
            background-image:
                radial-gradient(circle at 25px 25px, rgba(102, 126, 234, 0.1) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(118, 75, 162, 0.1) 2px, transparent 0);
            background-size: 100px 100px;
        }

        .gradient-ring {
            position: relative;
            border-radius: 0.75rem;
        }

        .gradient-ring::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 2px;
            border-radius: inherit;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
    </style>
</head>

<body class="h-full">
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('profile.show') }}"
                            class="w-10 h-10 btn-gradient rounded-full flex items-center justify-center text-white transition duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="flex items-center justify-center min-h-screen px-4 mt-4x">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold gradient-text mb-2 mt-4">Book Your Ticket</h1>
                <h2 class="text-3xl font-bold text-gray-800">{{ $event->title }}</h2>
            </div>
            <div class="mb-6">
                <img src="{{ asset($event->poster) }}" alt="Concert Image"
                    class="rounded-lg shadow-md w-full object-cover">
            </div>
            <div class="space-y-4 mb-6">
                @foreach ($event->tickets as $ticket)
                    <!-- Regular Ticket -->
                    <a href="/select-ticket/book/{{ $ticket->id }}"
                        class="flex items-center justify-between p-4 hover:shadow-md transition duration-200 gradient-ring">

                        <!-- Icon and Info -->
                        <div class="flex items-center space-x-4">
                            <!-- Image Icon -->
                            <div
                                class="icon-bg text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-ticket-alt text-xl md:text-2xl"></i>
                            </div>

                            <!-- Ticket Info -->
                            <div ml>
                                <div class="text-lg font-bold gradient-text">{{ $ticket->ticket_type }}</div>
                                <div class="text-lg font-semibold text-gray-600">
                                    Remaining : {{ $ticket->stock - $ticket->sold }}/{{ $ticket->stock }}</div>
                            </div>
                        </div>

                        <!-- Price and Arrow -->
                        <div class="flex items-center space-x-2">
                            <div class="gradient-text font-bold">Rp{{ number_format($ticket->price, 0, ',', '.') }}
                            </div>
                            <!-- Arrow Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                <!-- Definisi gradient -->
                                <defs>
                                    <linearGradient id="btnGradient" x1="0" y1="0" x2="1"
                                        y2="1">
                                        <stop offset="0%" stop-color="#667eea" />
                                        <stop offset="100%" stop-color="#764ba2" />
                                    </linearGradient>
                                </defs>

                                <!-- Gunakan gradient sebagai stroke -->
                                <path d="M9 5l7 7-7 7" stroke="url(#btnGradient)" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
