<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - My Reviews</title>
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
            font-weight: 600; /* semi-bold */
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
                    <a href="{{ route('organizer.dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
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
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Reviews</h1>
        </div>

        <div class="border-b border-gray-200 mb-8">
            {{-- PERUBAHAN UTAMA: Semua nama rute disesuaikan dengan web.php Anda --}}
            <nav class="-mb-px flex space-x-8 overflow-x-auto">
                <a href="{{ route('organizer.profile') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Profile
                </a>
                <a href="{{ route('organizer.profile.reviews') }}" class="tab-active py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                    Reviews
                </a>
                <a href="{{ route('organizer.history') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Events History
                </a>
                <a href="{{ route('orgprofilehelp.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Help Center
                </a>
            </nav>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @forelse ($events as $event)
                    <a href="{{ route('organizer.profile.reviews.show', $event) }}" 
                       class="block bg-white rounded-xl shadow-lg p-4 card-hover 
                              @if($selectedEvent && $selectedEvent->id == $event->id) border-2 border-purple-500 ring-2 ring-purple-200 @else border border-transparent @endif">
                        
                        <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->title }}" class="w-full h-40 object-cover rounded-lg mb-4">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 text-center w-12">
                                <p class="text-sm font-semibold text-purple-600">{{ $event->event_date->format('M') }}</p>
                                <p class="text-xl font-bold text-gray-800">{{ $event->event_date->format('d') }}</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $event->title }}</h3>
                                @if($event->tickets->count() > 0)
                                    <p class="text-sm font-semibold text-gray-800 mt-1">
                                        Rp. {{ number_format($event->tickets->min('price')) }} – {{ number_format($event->tickets->max('price')) }}
                                    </p>
                                @else
                                    <p class="text-sm font-semibold text-gray-500 mt-1">No tickets yet</p>
                                @endif
                                <p class="text-sm text-gray-500 mt-2 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                                    {{ $event->location }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="sm:col-span-2 text-center text-gray-500">You have not created any events yet.</p>
                @endforelse
            </div>

            <div class="space-y-6">
                @if ($selectedEvent)
                    <h2 class="text-3xl font-bold text-gray-900">{{ $selectedEvent->title }} Reviews</h2>
                    @forelse ($reviews as $review)
                        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                            <div class="flex items-start space-x-4">
                                <img src="https://i.pravatar.cc/48?u={{ $review->user->id }}" alt="{{ $review->user->name }}" class="w-12 h-12 rounded-full">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <h4 class="font-semibold text-gray-800">{{ $review->user->name }}</h4>
                                        <div class="text-yellow-400 text-sm flex items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">"{{ $review->review }}"</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 text-center text-gray-500">
                            No reviews for this event yet.
                        </div>
                    @endforelse
                @else
                    <h2 class="text-3xl font-bold text-gray-900">No Event Selected</h2>
                    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 text-center text-gray-500">
                        Please create an event to see reviews.
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>