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
                @if ($event)
                    <div class="mb-6">
                        <img src="/images/bernadya.jpeg" alt="Concert Image"
                            class="rounded-lg shadow-md w-full object-cover">
                    </div>
                    <div>
                        <div class="mg-8 font-semibold text-2xl text-gray-600">
                            {{ $event->title }}
                        </div>
                        <div class="mg-8 font-medium text-sm text-gray-600">
                            {{ $event->formatted_date }}
                        </div>
                        <div class="mg-8 font-medium text-sm text-gray-600">
                            {{ $event->location }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="space-y-4 mb-6">
                <!-- Regular Ticket -->
                <div>
                    <h2 class="text-md font-semibold text-gray-800 mt-2 mb-2">Tickets</h2>
                    @foreach ($order_items as $item)
                        <div class="bg-purple-600 p-4 rounded-xl flex justify-between items-center">
                            <div>
                                <div class="text-lg font-semibold text-white">{{ $item->ticket->ticket_type }}</div>
                            </div>
                            <div class="text-lg font-semibold text-white">
                                Rp{{ number_format($item->price, 0, ',', '.') }} x{{ $item->quantity }}</div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h2 class="text-md font-semibold text-gray-800 mb-2">Payment Method</h2>
                    <div class="bg-purple-600 p-4 rounded-xl grid grid-cols-8">
                        <div><input type="radio" checked class="accent-purple-600 w-5 h-5 mr-3 col-span-1"></div>
                        <div class="flex items-center mb-2 col-span-7 font-semibold text-white">
                            DANA
                        </div>
                        <div class="col-span-1"></div>
                        <div class="text-sm text-white col-span-7">Get a voucher reward of IDR 5,000 for the first
                            transaction use
                            linked DANA during the period promo.</div>
                        <a href="/select-ticket/order-details/select-payment"
                            class="mt-4 bg-white p-4 rounded-xl justify-between text-center col-span-8 text-purple-600">CHOOSE
                            OTHER METHOD</a>
                    </div>
                </div>
                <div class="bg-purple-600 p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="text-lg font-semibold text-white">Finish Payment</div>
                    </div>
                    <div class="text-lg font-semibold text-white">
                        Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
