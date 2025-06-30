<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding New Tickets - FestiPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .btn-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-gradient:hover { background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%); }
        .form-input { transition: all 0.3s ease; }
        .form-input:focus { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.3); border-color: #667eea; }
    </style>
</head>
<body class="bg-white font-poppins">
    {{-- PERUBAHAN: Header diganti dengan versi baru yang lebih konsisten --}}
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    {{-- Link ke dashboard organizer --}}
                    <a href="{{ route('organizer.dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
                </div>

                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-600">Organizer</span>
                    {{-- Link ke halaman utama profil organizer --}}
                    <a href="{{ route('organizer.profile') }}" 
                       class="w-10 h-10 btn-gradient rounded-full flex items-center justify-center text-white transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Kontainer utama halaman tidak perlu diubah, karena header sudah memiliki container sendiri --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-lg mx-auto">
            <div class="text-right mb-4">
                <span class="text-sm text-gray-500">Adding Ticket for {{ $concert->title }}</span>
            </div>

            <section class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text">Adding New Tickets</h2>
            </section>

            <form action="{{ route('managetickets.store_ticket', $concert) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="ticket_category_name" class="block text-sm font-medium text-gray-700">Ticket Category Name</label>
                    <input type="text" name="ticket_type" id="ticket_category_name" placeholder="e.g., VVIP, Regular, etc" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900 placeholder-gray-400">
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" placeholder="e.g., 150000" min="0" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900 placeholder-gray-400">
                </div>
                <div>
                    <label for="quota" class="block text-sm font-medium text-gray-700">Quota (Stock)</label>
                    <input type="number" name="stock" id="quota" placeholder="e.g., 100" min="1" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900 placeholder-gray-400">
                </div>
                <div class="flex justify-center pt-4">
                    <button type="submit"
                       class="inline-flex justify-center py-2 px-6 border border-transparent shadow-lg text-sm font-medium rounded-md text-white btn-gradient transition duration-200 transform hover:scale-105">
                        Add Ticket
                    </button>
                </div>
            </form>
        </div>
        <footer class="text-center mt-12 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>