<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Concert - {{ $concert->title }}</title>
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
        .card-interactive-effect { transition: all 0.3s ease; }
        .card-interactive-effect:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.3); border-color: #667eea; }
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
        <section class="text-center mb-4">
            <h2 class="text-3xl md:text-4xl font-bold gradient-text">Edit Concert</h2>
            <p class="text-gray-600 text-lg md:text-xl mt-1">{{ $concert->title }}</p>
        </section>

        @if (session('success'))
            <div class="max-w-xl mx-auto mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <section class="mb-10">
            <div class="max-w-xl mx-auto p-3 sm:p-4 bg-gray-100 rounded-lg shadow">
                <div class="flex justify-center">
                    <!-- <img src="{{ asset('storage/' . $concert->poster) }}" alt="Poster for {{ $concert->title }}" class="w-full h-auto rounded"> -->
                    <img src="https://images.squarespace-cdn.com/content/v1/6234e8b7aacc0141c3c4512e/2a2bba4e-ad05-4b96-b981-e7fbef11fea8/arch+new+map.jpg" alt="Stage and Seating Plan" class="w-full h-auto rounded">
                </div>
            </div>
        </section>

        <section class="space-y-4 mb-8 max-w-sm mx-auto">
            @forelse ($tickets as $ticket)
            <a href="{{ route('managetickets.ticket.edit', ['concert' => $concert, 'ticket' => $ticket]) }}" class="block card-interactive-effect border border-gray-200 rounded-lg p-4 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                    <div class="flex items-center mb-3 sm:mb-0">
                        <div class="btn-gradient text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                            <i class="fas fa-ticket-alt text-xl md:text-2xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-base md:text-lg uppercase">{{ $ticket->ticket_type }}</p>
                            <p class="text-xs md:text-sm text-gray-500">{{ $ticket->sold }}/{{ $ticket->stock }} SOLD</p>
                        </div>
                    </div>
                    <div class="flex items-center self-end sm:self-center">
                        <p class="text-indigo-600 font-semibold mr-3 text-base md:text-lg">RP{{ number_format($ticket->price, 0, ',', '.') }}</p>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </div>
            </a>
            @empty
            <div class="text-center py-4">
                <p class="text-gray-500">No ticket types have been added yet.</p>
            </div>
            @endforelse
        </section>

        <div class="flex justify-center mb-6">
            <a href="{{ route('managetickets.add_form', $concert) }}"
               class="btn-gradient text-white rounded-full w-12 h-12 md:w-14 md:h-14 flex items-center justify-center text-2xl md:text-3xl shadow-lg transition duration-200 transform hover:scale-105">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        
        <div class="flex justify-center">
            <a href="{{ route('organizer.dashboard') }}" class="w-full sm:w-auto btn-gradient text-white font-semibold py-3 px-16 rounded-lg shadow-lg transition duration-200 transform hover:scale-105 text-base md:text-lg text-center">
                Finish Editing
            </a>
        </div>

        <footer class="text-center mt-12 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>