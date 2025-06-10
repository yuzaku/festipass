{{-- resources/views/profile/orgprofilehelpcenter.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Help Center</title>
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
                <a href="#" class="text-3xl font-bold gradient-text">FestiPass - Profile</a>
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
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Help Center</h1>
    </div>

    <div class="border-b border-gray-200 mb-8">
        <nav class="-mb-px flex space-x-8 overflow-x-auto">
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                My Profile
            </button>
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                Reviews
            </button>
            <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                Events History
            </button>
            <button class="tab-active py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                Help Center
            </button>
        </nav>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left: Ask For a Help -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-4">Ask For a Help</h2>
            <form action="{{ route('orgprofilehelp.send') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="w-full border border-gray-400 rounded-lg shadow-sm focus:ring focus:ring-purple-200 focus:border-purple-400"
                           required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="question" class="block font-medium mb-1">Questions</label>
                    <textarea id="question" name="question" rows="6"
                              class="w-full border border-gray-400 rounded-lg shadow-sm focus:ring focus:ring-purple-200 focus:border-purple-400"
                              required>{{ old('question') }}</textarea>
                    @error('question')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                        class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                    Send
                </button>
            </form>
        </div>

        <!-- Right: FAQ -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Frequently Asked Questions</h2>
            <div class="space-y-4 p-4 rounded-lg bg-gradient-to-br from-indigo-200 to-purple-200 shadow">
                <div>
                    <h3 class="text-purple-700 font-semibold">Apa itu Festipass?</h3>
                    <p class="text-gray-800 text-sm">
                        Festipass adalah aplikasi yang dirancang untuk memudahkan penyelenggara acara, termasuk konser, dalam menjual tiket secara online. Aplikasi ini menyediakan platform yang aman dan efisien untuk mengelola penjualan tiket dan interaksi dengan pengunjung.
                    </p>
                </div>
                <div>
                    <h3 class="text-purple-700 font-semibold">Bagaimana cara membuat acara dan menjual tiket di Festipass?</h3>
                    <p class="text-gray-800 text-sm">
                        Setelah mendaftar dan akun Anda disetujui, Anda dapat membuat acara baru melalui dashboard penyelenggara. Isi semua detail acara, termasuk nama, tanggal, lokasi, dan jenis tiket. Setelah itu, Anda dapat mengatur harga tiket dan jumlah yang tersedia untuk dijual.
                    </p>
                </div>
                <div>
                    <h3 class="text-purple-700 font-semibold">Apakah saya bisa mengatur berbagai jenis tiket?</h3>
                    <p class="text-gray-800 text-sm">
                        Ya, Anda dapat mengatur berbagai jenis tiket, seperti tiket reguler, VIP, dan tiket early bird. Anda juga dapat menentukan harga dan kuota untuk setiap jenis tiket.
                    </p>
                </div>
                <div>
                    <h3 class="text-purple-700 font-semibold">Apa yang harus saya lakukan jika ada masalah dengan penjualan tiket?</h3>
                    <p class="text-gray-800 text-sm">
                        Jika Anda mengalami masalah dengan penjualan tiket, Anda dapat menghubungi tim dukungan pelanggan Festipass melalui fitur bantuan di aplikasi atau melalui email. Tim kami siap membantu Anda menyelesaikan masalah dengan cepat.
                    </p>
                </div>
                <div>
                    <h3 class="text-purple-700 font-semibold">Apakah Festipass menyediakan laporan penjualan?</h3>
                    <p class="text-gray-800 text-sm">
                        Ya, Festipass menyediakan laporan penjualan yang dapat diakses melalui dashboard penyelenggara. Anda dapat melihat statistik penjualan, jumlah tiket yang terjual, dan informasi lainnya untuk membantu Anda menganalisis kinerja acara.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
