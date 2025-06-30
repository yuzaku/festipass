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

        .card-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        .bg-shopee {
            background: #FF7700 100%;
        }

        .bg-dana {
            background: #2E97EC 100%;
        }

        .bg-gopay {
            background: #4DC800 100%;
        }

        .bg-ovo {
            background: #7B61FF 100%;
        }

        .bg-bca {
            background: #0059FF 100%;
        }

        .bg-mandiri {
            background: #008DFF 100%;
        }

        .bg-bni {
            background: #FF8000 100%;
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
                <h1 class="text-4xl font-bold gradient-text mt-4 mb-2">Order Details</h1>
            </div>
            <div class="columns-2">
                @if ($event)
                    <div class="mb-6">
                        <img src="{{ asset($event->poster) }}" alt="Concert Image"
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
                        <div class="card-gradient p-4 rounded-xl flex justify-between items-center">
                            <div>
                                <div class="text-lg font-semibold text-white">{{ $item->ticket->ticket_type }}</div>
                            </div>
                            <div class="text-lg font-semibold text-white">
                                Rp{{ number_format($item->ticket->price, 0, ',', '.') }} x{{ $item->quantity }}</div>
                        </div>
                    @endforeach
                </div>
                @php
                    $bgColor = match (strtolower($order->payment_method)) {
                        'dana' => 'bg-dana',
                        'shopeepay' => 'bg-shopee',
                        'gopay  ' => 'bg-gopay',
                        'ovo' => 'bg-ovo',
                        'qris' => 'bg-qris',
                        'bank bca' => 'bg-bca',
                        'bank mandiri' => 'bg-mandiri',
                        'bank bni' => 'bg-bni',
                        default => 'bg-white',
                    };
                @endphp
                <div>
                    <h2 class="text-md font-semibold text-gray-800 mb-2">Payment Method</h2>
                    <div class="card-gradient p-4 rounded-xl grid grid-cols-8">
                        <div
                            class="w-10 h-10 rounded-full {{ $bgColor }} text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                        </div>
                        <div class="flex items-center mb-2 col-span-7 font-semibold text-white text-lg">
                            {{ $order->payment_method }}
                        </div>
                        <a href="{{ route('order.payment.form', $order->id) }}"
                            class="mt-4 p-4 rounded-xl justify-between text-center col-span-8 bg-white">
                            <span class="gradient-text text-lg font-bold">CHOOSE OTHER METHOD</span>
                        </a>
                    </div>
                </div>
                <button id="finishPaymentBtn" data-order="{{ $order->id }}"
                    class="w-full btn-gradient p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="text-lg font-semibold text-white">Finish Payment</div>
                    </div>
                    <div class="text-lg font-semibold text-white">
                        Rp{{ number_format($item->total_price, 0, ',', '.') }}</div>
                </button>
                <div id="successModal" class="fixed inset-0 bg-black/40 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-xl p-6 text-center shadow-xl">
                        <h2 class="text-xl font-bold gradient-text mb-2">Payment Successful!</h2>
                        <p class="text-gray-700 mb-4">Thank you, your order is now paid.</p>
                        <button id="goDashboard" class="btn-gradient text-white px-4 py-2 rounded">
                            Go to Dashboard
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('finishPaymentBtn').addEventListener('click', async function() {
            const orderId = this.dataset.order;

            const res = await fetch(`/orders/${orderId}/pay`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });

            if (res.ok) {
                // tampilkan modal sukses
                document.getElementById('successModal').classList.remove('hidden');
            }
        });

        // tombol dalam modal
        document.getElementById('goDashboard').addEventListener('click', () => {
            window.location.href = "{{ route('dashboard') }}";
        });
    </script>
</body>

</html>
