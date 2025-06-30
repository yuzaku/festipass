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
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold gradient-text mt-4 mb-2">Book Your Ticket</h1>
                <h2 class="text-3xl font-bold text-gray-800">{{ $event->title }}</h2>
            </div>
            <div class="mb-6">
                <img src="{{ asset($event->poster) }}" alt="Concert Image"
                    class="rounded-lg shadow-md w-full object-cover">
            </div>
            <div class="space-y-4 mb-6">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-red-600">{{ strtoupper($ticket->category) }}</h2>
                </div>
                <!-- Regular Ticket -->
                <a class="flex items-center justify-between border rounded-xl p-4 duration-200 gradient-ring">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold gradient-text">Number of Tickets</div>
                            <div class="text-lg font-semibold text-gray-600">
                                Rp{{ number_format($ticket->price, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <button id="minusBtn"
                            class="text-white btn-gradient rounded-full w-8 h-8 flex justify-center text-xl font-bold">−</button>
                        <span id="ticketCount" class="text-xl font-bold">1</span>
                        <button id="plusBtn"
                            class="text-white btn-gradient rounded-full w-8 h-8 flex justify-center text-xl font-bold">+</button>
                    </div>
                </a>
                <form method="POST" action="/select-ticket/order/{{ $ticket->id }}">
                    @csrf
                    <input type="hidden" name="ticket_count" id="ticketCountInput" value="1">
                    <button type="submit"
                        class="w-full flex justify-between items-center btn-gradient text-white px-5 py-3 rounded-xl shadow hover:bg-purple-700 transition duration-200 ">
                        <div class="text-left">
                            <div class="text-lg font-bold" id='totalTicket'>1 Ticket</div>
                            <div class="text-lg font-semibold" id="totalPrice">
                                Rp{{ number_format($ticket->price, 0, ',', '.') }}</div>
                        </div>
                        <!-- Ticket Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div id="alertModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 text-center shadow-xl">
            <h2 class="text-lg font-bold text-red-600 mb-2">Pembelian Melebihi Batas</h2>
            <p class="text-gray-700 mb-4">Maksimal pembelian adalah 3 tiket.</p>
            <button onclick="closeModal()" class="btn-gradient text-white px-4 py-2 rounded transition">Tutup</button>
        </div>
    </div>
    <script>
        const ticketPrice = {{ $ticket->price }};
        let count = 1;

        const countDisplay = document.getElementById('ticketCount');
        const totalTicketCountDisplay = document.getElementById('totalTicket');
        const totalPriceDisplay = document.getElementById('totalPrice');

        document.getElementById('plusBtn').addEventListener('click', () => {
            if (count >= 3) {
                document.getElementById('alertModal').classList.remove('hidden');
                return;
            }
            count++;
            updateDisplay();
        });

        document.getElementById('minusBtn').addEventListener('click', () => {
            if (count > 1) {
                count--;
                updateDisplay();
            }
        });

        function updateDisplay() {
            countDisplay.textContent = count;
            totalPriceDisplay.textContent = `Rp${(ticketPrice * count).toLocaleString('id-ID')}`;
            totalTicketCountDisplay.textContent = `${count} Ticket`;
            document.getElementById('ticketCountInput').value = count;
        }

        function closeModal() {
            document.getElementById('alertModal').classList.add('hidden');
        }
    </script>
</body>

</html>
