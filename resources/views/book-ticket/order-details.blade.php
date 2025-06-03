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
                <h1 class="text-4xl font-bold text-purple-600 mb-2">Order Details</h1>
            </div>
            <div class="columns-2">
                <div class="mb-6">
                    <img src="/images/bernadya.jpeg" alt="Concert Image"
                        class="rounded-lg shadow-md w-full object-cover">
                </div>
                <div>
                    <div class="mg-8 font-semibold text-2xl text-gray-600">
                        Panic! at The Disco
                    </div>
                    <div class="mg-8 font-medium text-sm text-gray-600">
                        Saturday, 01 November 2025
                    </div>
                    <div class="mg-8 font-medium text-sm text-gray-600">
                        Icon, BSD
                    </div>
                </div>
            </div>
            <div class="space-y-4 mb-6">
                <!-- Regular Ticket -->
                <h2 class="text-md font-semibold text-gray-800 mb-2">Tickets</h2>
                <div class="bg-purple-100 p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="text-md font-semibold text-purple-600">VVIP</div>
                        <div class="text-gray-700">Rp110.000</div>
                    </div>
                    <div class="text-lg font-bold text-gray-800">x3</div>
                </div>
                <div>
                    <h2 class="text-md font-semibold text-gray-800 mb-2">Payment Method</h2>
                    <div class="bg-purple-100 p-4 rounded-xl">
                        <div class="flex items-center mb-3">
                            <input type="radio" checked class="accent-purple-600 w-5 h-5 mr-3">
                            <span class="font-semibold text-gray-800">DANA</span>
                        </div>
                        <p class="text-sm text-gray-600">Get a voucher reward of IDR 5,000 for the first transaction use
                            linked DANA during the period promo.</p>
                        <button class="mt-3 text-purple-600 underline text-sm">CHOOSE OTHER METHOD</button>
                    </div>
                </div>
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
        const ticketPrice = 110000;
        let count = 1;

        const countDisplay = document.getElementById('ticketCount');
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
        }

        function closeModal() {
            document.getElementById('alertModal').classList.add('hidden');
        }
    </script>
</body>

</html>
