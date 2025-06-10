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
                <img src="{{ asset($event->poster) }}" alt="Concert Image" class="rounded-lg shadow-md w-full object-cover">
            </div>
            <div class="space-y-4 mb-6">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-red-600">{{ strtoupper($ticket->category) }}</h2>
                </div>
                <!-- Regular Ticket -->
                <a class="flex items-center justify-between border rounded-xl p-4 duration-200 ring-2 ring-purple-500">

                    <!-- Icon and Info -->
                    <div class="flex items-center space-x-4">

                        <!-- Ticket Info -->
                        <div>
                            <div class="text-lg font-bold text-purple-600">Number of Tickets</div>
                            <div class="text-lg font-semibold text-gray-600">
                                Rp{{ number_format($ticket->price, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <button id="minusBtn"
                            class="text-white bg-purple-600 rounded-full w-8 h-8 flex justify-center text-xl font-bold">−</button>
                        <span id="ticketCount" class="text-xl font-bold">1</span>
                        <button id="plusBtn"
                            class="text-white bg-purple-600 rounded-full w-8 h-8 flex justify-center text-xl font-bold">+</button>
                    </div>
                </a>
                <form method="POST" action="/select-ticket/order/{{ $ticket->id }}">
                    @csrf
                    <input type="hidden" name="ticket_count" id="ticketCountInput" value="1">
                    <button type="submit"
                        class="flex justify-between items-center bg-purple-600 text-white px-5 py-3 rounded-xl shadow hover:bg-purple-700 transition duration-200">
                        <div class="text-left">
                            <div class="text-lg font-bold" id='totalTicket'>1 Ticket</div>
                            <div class="text-lg font-semibold" id="totalPrice">Rp{{ number_format($ticket->price, 0, ',', '.') }}</div>
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
            <button onclick="closeModal()"
                class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">Tutup</button>
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
