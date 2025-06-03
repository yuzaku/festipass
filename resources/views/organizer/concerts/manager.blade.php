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
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
                    <a href="{{ route('organizer.reports') }}" 
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
        <!-- Page Header with Search -->
        <div class="text-center mb-12 hero-pattern py-16 rounded-2xl relative overflow-hidden">
            <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-4">
                My Concerts
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Manage and track all your concerts in one place.
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto mb-6">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search by events, name, location, and more"
                           class="w-full px-6 py-4 text-lg border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-lg pr-16">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 btn-gradient text-white w-12 h-12 rounded-full transition duration-200 flex items-center justify-center shadow-lg hover:scale-105">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                </div>
            </div>
            
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <button class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Artist</button>
                <button class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Genre</button>
                <button class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Location</button>
                <button class="px-6 py-2 btn-gradient text-white rounded-full transition duration-200 transform hover:scale-105 shadow-lg">Price</button>
            </div>
        </div>

        <!-- Concerts Section -->
        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Your Concerts</h2>
                <div class="flex items-center space-x-4">
                    <!-- Create New Concert Button -->
                    <a href="{{ route('organizer.concerts.create') }}" 
                       class="inline-flex items-center px-6 py-3 btn-gradient text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Create New Concert
                    </a>
                    <!-- View Toggle -->
                    <div class="flex bg-gray-100 rounded-lg p-1">
                        <button class="px-4 py-2 btn-gradient text-white rounded-md text-sm font-medium transition duration-200">
                            <i class="fas fa-th-large mr-2"></i>Grid
                        </button>
                        <button class="px-4 py-2 text-gray-600 hover:text-gray-900 rounded-md text-sm font-medium transition duration-200">
                            <i class="fas fa-list mr-2"></i>List
                        </button>
                    </div>
                    <!-- Sort -->
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option>Sort by Date</option>
                        <option>Sort by Name</option>
                        <option>Sort by Status</option>
                    </select>
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
                        Ready to create your first concert? Add event details, set ticket prices, and start selling tickets to music fans worldwide.
                    </p>
                    
                    <!-- Quick Start Actions -->
                    <div class="space-y-4 mb-8">
                        <a href="{{ route('organizer.concerts.create') }}" 
                           class="inline-flex items-center px-8 py-4 btn-gradient text-white font-semibold rounded-full transition duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-plus mr-3"></i>
                            Create Your First Concert
                        </a>
                        <div class="text-sm text-gray-500">
                            or <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Import from CSV</a>
                        </div>
                    </div>

                    <!-- Getting Started Tips -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 btn-gradient rounded-full mx-auto mb-4">
                                <i class="fas fa-pencil-alt text-white text-xl"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">1. Create Event</h4>
                            <p class="text-sm text-gray-600">Add concert details, date, venue, and artist information</p>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 btn-gradient rounded-full mx-auto mb-4">
                                <i class="fas fa-tag text-white text-xl"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">2. Set Pricing</h4>
                            <p class="text-sm text-gray-600">Configure ticket categories and pricing tiers</p>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 btn-gradient rounded-full mx-auto mb-4">
                                <i class="fas fa-rocket text-white text-xl"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">3. Go Live</h4>
                            <p class="text-sm text-gray-600">Publish your concert and start selling tickets</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Concert Grid (akan ditampilkan ketika ada data) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($concerts as $concert)
                        <!-- Concert Card akan ditampilkan di sini -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 card-hover">
                            <!-- Concert card content -->
                        </div>
                    @endforeach
                </div>
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
                        <p class="text-sm text-green-600">+0% from last month</p>
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
                        <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                        <p class="text-sm text-yellow-600">+0% from last month</p>
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
            <a href="{{ route('organizer.reports') }}" 
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
                    Return to your main dashboard to access overall statistics and manage your events efficiently.
                </p>
                <div class="mt-4 text-purple-600 font-medium flex items-center">
                    Go to Dashboard <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition duration-200"></i>
                </div>
            </a>
        </div>
    </main>

    <script>
        // Simple hover animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add click effect to buttons
            document.querySelectorAll('button, a').forEach(element => {
                element.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // View toggle functionality
            const gridBtn = document.querySelector('button:has(.fa-th-large)');
            const listBtn = document.querySelector('button:has(.fa-list)');
            
            if (gridBtn && listBtn) {
                listBtn.addEventListener('click', function() {
                    gridBtn.classList.remove('btn-gradient', 'text-white');
                    gridBtn.classList.add('text-gray-600', 'hover:text-gray-900');
                    listBtn.classList.add('btn-gradient', 'text-white');
                    listBtn.classList.remove('text-gray-600', 'hover:text-gray-900');
                });
                
                gridBtn.addEventListener('click', function() {
                    listBtn.classList.remove('btn-gradient', 'text-white');
                    listBtn.classList.add('text-gray-600', 'hover:text-gray-900');
                    gridBtn.classList.add('btn-gradient', 'text-white');
                    gridBtn.classList.remove('text-gray-600', 'hover:text-gray-900');
                });
            }
        });
    </script>
</body>
</html>