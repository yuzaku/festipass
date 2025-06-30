<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Concerts Manager</title>
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
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .icon-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25px 25px, rgba(102, 126, 234, 0.1) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(118, 75, 162, 0.1) 2px, transparent 0);
            background-size: 100px 100px;
        }
    </style>
</head>
<body class="bg-gray-50 font-poppins">
    <!-- Header Navigation -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('organizer.dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('organizer.dashboard') }}" 
                       class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Dashboard
                    </a>
                    <a href="{{ route('salesreport.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                        <i class="fas fa-chart-line mr-2"></i>
                        Sales Reports
                    </a>
                    <!-- Organizer Profile -->
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600">Organizer</span>
                        <a href="{{ route('organizer.profile') }}" 
                           class="w-10 h-10 btn-gradient rounded-full flex items-center justify-center text-white transition duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div id="success-message" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative transition-all duration-300">
                <span>{{ session('success') }}</span>
                <button onclick="hideMessage('success-message')" class="absolute top-1/2 transform -translate-y-1/2 right-2 text-green-600 hover:text-green-800 w-6 h-6 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('warning'))
            <div id="warning-message" class="mb-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative transition-all duration-300">
                <span>{{ session('warning') }}</span>
                <button onclick="hideMessage('warning-message')" class="absolute top-1/2 transform -translate-y-1/2 right-2 text-yellow-600 hover:text-yellow-800 w-6 h-6 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div id="error-message" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition-all duration-300">
                <span>{{ session('error') }}</span>
                <button onclick="hideMessage('error-message')" class="absolute top-1/2 transform -translate-y-1/2 right-2 text-red-600 hover:text-red-800 w-6 h-6 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <!-- Page Header with Search -->
        <div class="text-center mb-12 hero-pattern py-16 rounded-2xl relative overflow-hidden">
            <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-4">
                My Concerts
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Manage and track all your concerts in one place. Real data from database.
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto mb-6">
                <form method="GET" action="{{ route('organizer.concerts') }}">
                    <div class="relative">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search by events, name, location, and more"
                               class="w-full px-6 py-4 text-lg border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-lg pr-16">
                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 btn-gradient text-white w-12 h-12 rounded-full transition duration-200 flex items-center justify-center shadow-lg hover:scale-105">
                            <i class="fas fa-search text-lg"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('organizer.concerts', ['status' => 'published']) }}" 
                   class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Published</a>
                <a href="{{ route('organizer.concerts', ['status' => 'draft']) }}" 
                   class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Draft</a>
                <a href="{{ route('organizer.concerts') }}" 
                   class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">All Concerts</a>
            </div>
        </div>

        <!-- Concerts Section -->
        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Your Concerts ({{ $totalConcerts }} total)</h2>
                <div class="flex items-center space-x-4">
                    <!-- Create New Concert Button -->
                    <a href="{{ route('organizer.concerts.create') }}" 
                       class="inline-flex items-center px-6 py-3 btn-gradient text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Create New Concert
                    </a>
                </div>
            </div>

            @if($totalConcerts == 0)
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-200 mb-8">
                    <div class="flex items-center justify-center w-32 h-32 btn-gradient rounded-full mx-auto mb-8 shadow-lg">
                        <i class="fas fa-calendar-plus text-white text-4xl"></i>
                    </div>
                    
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">No Concerts Yet</h3>
                    <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">
                        Ready to create your first concert? Follow these simple steps to get started and reach music fans worldwide.
                    </p>
                    
                    <!-- Quick Start Actions -->
                    <div class="space-y-4 mb-8">
                        <a href="{{ route('organizer.concerts.create') }}" 
                           class="inline-flex items-center px-8 py-4 btn-gradient text-white font-semibold rounded-full transition duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-plus mr-3"></i>
                            Create Your First Concert
                        </a>
                    </div>
                </div>
            @else
                <!-- Concert Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($concerts as $concert)
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 card-hover overflow-hidden">
                            <!-- Concert Image -->
                            <div class="h-48 bg-cover bg-center relative" style="background-image: url('{{ $concert->poster_url }}')">
                                <div class="absolute top-4 left-4">
                                    {!! $concert->status_badge !!}
                                </div>
                                <div class="absolute top-4 right-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('organizer.concerts.edit', $concert->id) }}" 
                                           class="bg-white bg-opacity-90 hover:bg-opacity-100 text-purple-600 w-8 h-8 rounded-full flex items-center justify-center transition duration-200">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form method="POST" action="{{ route('organizer.concerts.delete', $concert->id) }}" 
                                              onsubmit="return confirm('Are you sure you want to delete this concert?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-white bg-opacity-90 hover:bg-opacity-100 text-red-600 w-8 h-8 rounded-full flex items-center justify-center transition duration-200">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                                    <div class="text-white">
                                        <h3 class="text-lg font-bold truncate">{{ $concert->title }}</h3>
                                        <p class="text-sm opacity-90">{{ $concert->artist }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Concert Info -->
                            <div class="p-6">
                                <p class="text-sm text-gray-600 mb-2 truncate">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span class="truncate">{{ $concert->location }}</span>
                                </p>
                                <p class="text-sm text-gray-600 mb-4">
                                    <i class="fas fa-calendar mr-1"></i>
                                    {{ $concert->formatted_date }} at {{ $concert->formatted_time }}
                                </p>
                                
                                <!-- Stats -->
                                <div class="grid grid-cols-2 gap-4 mb-4 text-center">
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <div class="text-xl font-bold text-purple-600">{{ $concert->getTicketsSoldCount() }}</div>
                                        <div class="text-xs text-gray-500">Tickets Sold</div>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        @php
                                            $concertRevenue = $concert->getTotalRevenue();
                                            if ($concertRevenue >= 1000000000) {
                                                $revFormat = number_format($concertRevenue / 1000000000, 1) . 'B';
                                            } elseif ($concertRevenue >= 1000000) {
                                                $revFormat = number_format($concertRevenue / 1000000, 0) . 'M';
                                            } elseif ($concertRevenue >= 1000) {
                                                $revFormat = number_format($concertRevenue / 1000, 0) . 'K';
                                            } else {
                                                $revFormat = number_format($concertRevenue, 0);
                                            }
                                        @endphp
                                        <div class="text-xl font-bold text-green-600 whitespace-nowrap">{{ $revFormat }}</div>
                                        <div class="text-xs text-gray-500">Revenue</div>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('organizer.concerts.edit', $concert->id) }}" 
                                       class="text-purple-600 hover:text-purple-800 font-medium text-sm whitespace-nowrap">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <span class="text-xs text-gray-500 text-right whitespace-nowrap">
                                        Created {{ $concert->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($concerts->hasPages())
                    <div class="mt-8">
                        {{ $concerts->appends(request()->query())->links() }}
                    </div>
                @endif
            @endif
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Total Concerts -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Concerts</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalConcerts }}</p>
                        <p class="text-sm text-purple-600">All time</p>
                    </div>
                    <div class="flex items-center justify-center w-14 h-14 icon-bg rounded-xl">
                        <i class="fas fa-music text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Tickets Sold -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Tickets Sold</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($ticketsSold) }}</p>
                        <p class="text-sm text-green-600">From {{ $totalConcerts }} concerts</p>
                    </div>
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-r from-green-500 to-teal-600 rounded-xl">
                        <i class="fas fa-ticket-alt text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Revenue</p>
                        @php
                            $revenue = $totalRevenue;
                            if ($revenue >= 1000000000) {
                                $formatted = 'Rp ' . number_format($revenue / 1000000000, 1) . 'B';
                            } elseif ($revenue >= 1000000) {
                                $formatted = 'Rp ' . number_format($revenue / 1000000, 0) . 'M';
                            } elseif ($revenue >= 1000) {
                                $formatted = 'Rp ' . number_format($revenue / 1000, 0) . 'K';
                            } else {
                                $formatted = 'Rp ' . number_format($revenue, 0);
                            }
                        @endphp
                        <p class="text-3xl font-bold text-gray-900 whitespace-nowrap">{{ $formatted }}</p>
                        <p class="text-sm text-yellow-600">From {{ $totalConcerts }} concerts</p>
                    </div>
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl">
                        <i class="fas fa-dollar-sign text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Rating -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Average Rating</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($averageRating, 1) }}</p>
                        <p class="text-sm text-pink-600">From {{ $totalConcerts }} concerts</p>
                    </div>
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-r from-pink-500 to-red-600 rounded-xl">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sales Analytics -->
            <a href="{{ route('salesreport.index') }}" 
               class="bg-white rounded-xl shadow-lg p-8 border border-gray-200 card-hover group">
                <div class="flex items-center mb-6">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-r from-green-500 to-teal-600 rounded-xl mr-4 group-hover:scale-110 transition duration-200">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Sales Analytics</h4>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Track your ticket sales, revenue, and audience insights with detailed reports and real-time analytics.
                </p>
                <div class="mt-4 text-green-600 font-medium flex items-center">
                    View Reports <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition duration-200"></i>
                </div>
            </a>

            <!-- Profile Settings -->
            <a href="{{ route('organizer.profile') }}" 
               class="bg-white rounded-xl shadow-lg p-8 border border-gray-200 card-hover group">
                <div class="flex items-center mb-6">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl mr-4 group-hover:scale-110 transition duration-200">
                        <i class="fas fa-user-cog text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Profile Settings</h4>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Update your organizer profile, contact information, and account preferences to personalize your experience.
                </p>
                <div class="mt-4 text-orange-600 font-medium flex items-center">
                    Manage Profile <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition duration-200"></i>
                </div>
            </a>

            <!-- Back to Dashboard -->
            <a href="{{ route('organizer.dashboard') }}" 
               class="bg-white rounded-xl shadow-lg p-8 border border-gray-200 card-hover group">
                <div class="flex items-center mb-6">
                    <div class="flex items-center justify-center w-14 h-14 icon-bg rounded-xl mr-4 group-hover:scale-110 transition duration-200">
                        <i class="fas fa-home text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Dashboard</h4>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Return to your main dashboard to see overall statistics and quick actions.
                </p>
                <div class="mt-4 text-purple-600 font-medium flex items-center">
                    Go to Dashboard <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition duration-200"></i>
                </div>
            </a>
        </div>
    </main>

    <script>
        // Auto-hide messages function
        function hideMessage(messageId) {
            const message = document.getElementById(messageId);
            if (message) {
                message.style.opacity = '0';
                message.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    message.remove();
                }, 300);
            }
        }

        // Simple hover animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide success/error/warning messages after 5 seconds
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const warningMessage = document.getElementById('warning-message');
            
            if (successMessage) {
                setTimeout(() => {
                    hideMessage('success-message');
                }, 5000); // 5 seconds
            }
            
            if (warningMessage) {
                setTimeout(() => {
                    hideMessage('warning-message');
                }, 6000); // 6 seconds for warnings
            }
            
            if (errorMessage) {
                setTimeout(() => {
                    hideMessage('error-message');
                }, 7000); // 7 seconds for errors (longer to read)
            }
            
            // Add click effect to buttons
            document.querySelectorAll('button, a').forEach(element => {
                element.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>