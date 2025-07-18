<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket - {{ $ticket->ticket_type }}</title>
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
                    <a href="{{ route('organizer.dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
                </div>

                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-600">Organizer</span>
                    <a href="{{ route('organizer.profile') }}" 
                       class="w-10 h-10 btn-gradient rounded-full flex items-center justify-center text-white transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-lg mx-auto">
            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <section class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text">Edit Ticket</h2>
                <p class="text-gray-500 mt-1">Editing ticket for: {{ $concert->title }}</p>
            </section>

            <form id="edit-ticket-form" action="{{ route('managetickets.ticket.update', ['concert' => $concert, 'ticket' => $ticket]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="ticket_category_name" class="block text-sm font-medium text-gray-700">Ticket Category Name</label>
                    <input type="text" name="ticket_type" id="ticket_category_name" value="{{ old('ticket_type', $ticket->ticket_type) }}" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900">
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $ticket->price) }}" min="0" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900">
                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Quota (Stock)</label>
                    <input type="number" name="stock" id="stock-input" value="{{ old('stock', $ticket->stock) }}" min="0" required
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm text-gray-900">
                    <p id="stock-error" class="text-red-500 text-xs mt-1 hidden"></p>
                </div>
            </form>

            <div class="flex items-center justify-between pt-6 mt-6 border-t">
                <form action="{{ route('managetickets.ticket.destroy', ['concert' => $concert, 'ticket' => $ticket]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                       class="inline-flex justify-center py-2 px-6 border border-red-600 text-red-600 font-medium rounded-md shadow-sm hover:bg-red-50 transition duration-200"
                       onclick="return confirm('Are you sure you want to delete this ticket type? This action cannot be undone.')">
                        Delete
                    </button>
                </form>
                <button type="submit" form="edit-ticket-form" id="save-button"
                   class="inline-flex justify-center py-2 px-6 border border-transparent shadow-lg text-sm font-medium rounded-md text-white btn-gradient transition duration-200 transform hover:scale-105">
                    Save Edit
                </button>
            </div>
        </div>
        <footer class="text-center mt-12 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>

    <script>
        const stockInput = document.getElementById('stock-input');
        const saveButton = document.getElementById('save-button');
        const stockError = document.getElementById('stock-error');
        const soldCount = {{ $ticket->sold }};

        stockInput.addEventListener('input', function() {
            const currentStock = parseInt(this.value, 10);
            if (isNaN(currentStock) || currentStock < soldCount) {
                saveButton.disabled = true;
                saveButton.classList.add('opacity-50', 'cursor-not-allowed');
                stockError.textContent = `Stock cannot be lower than tickets already sold (${soldCount}).`;
                stockError.classList.remove('hidden');
            } else {
                saveButton.disabled = false;
                saveButton.classList.remove('opacity-50', 'cursor-not-allowed');
                stockError.classList.add('hidden');
            }
        });
    </script>
</body>
</html>