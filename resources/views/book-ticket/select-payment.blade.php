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
                <h1 class="text-4xl font-bold gradient-text mb-2 mt-4">Select Other Payment</h1>
            </div>
            <div class="space-y-4 mb-6">
                <form method="POST" action="{{ route('order.payment.save', $order->id) }}">
                    @csrf
                    <!-- Regular Ticket -->
                    <div>
                        <h2 class="text-md font-semibold text-gray-800 mb-2">QRIS</h2>
                        <button type="submit" name="payment_method" value="QRIS"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-white text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    QRIS
                                </div>
                            </div>
                        </button>
                    </div>
                    <div>
                        <h2 class="text-md font-semibold text-gray-800 mb-2">E-Wallet</h2>
                        <button type="submit" name="payment_method" value="DANA"
                            class="btn-gradient w-full p-4 rounded-xl flex items-start space-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-dana text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    DANA
                                </div>

                                <div class="text-sm text-white">
                                    Get a voucher reward of IDR 5,000 for
                                    the first
                                    transaction use
                                    linked DANA during the period promo.
                                </div>
                            </div>

                        </button>
                        <button type="submit" name="payment_method" value="ShopeePay"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-shopee text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    ShopeePay
                                </div>

                                <div class="text-sm text-white">
                                    Cashback 10k coins for all users.
                                </div>
                            </div>

                        </button>
                        <button type="submit" name="payment_method" value="GoPay"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">
                            <div
                                class="w-10 h-10 rounded-full bg-gopay text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    GoPay
                                </div>

                                <div class="text-sm text-white">
                                    Cashback 10k coins for first
                                    transaction.
                                </div>
                            </div>
                        </button>
                        <button type="submit" name="payment_method" value="OVO"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">
                            <div
                                class="w-10 h-10 rounded-full bg-ovo text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    OVO
                                </div>

                                <div class="text-sm text-white">
                                    Cashback 2500 points for all transactions.
                                </div>
                            </div>
                        </button>
                    </div>
                    <div>
                        <h2 class="text-md font-semibold text-gray-800 mb-2">Bank</h2>
                        <button type="submit" name="payment_method" value="Bank BCA"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-bca text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    Bank BCA
                                </div>
                            </div>
                        </button>
                        <button type="submit" name="payment_method" value="Bank Mandiri"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-mandiri text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    Bank Mandiri
                                </div>
                            </div>
                        </button>
                        <button type="submit" name="payment_method" value="Bank BNI"
                            class="btn-gradient w-full p-4 rounded-xl flex items-center gap-x-4 mb-2 text-left">

                            <div
                                class="w-10 h-10 rounded-full bg-bni text-purple-600 flex items-center justify-center font-bold shadow flex-shrink-0">

                            </div>

                            <div class="flex flex-col">
                                <div class="font-semibold text-white">
                                    Bank BNI
                                </div>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
