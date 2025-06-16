<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Organizer Dashboard</title>
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
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 50%, #1e40af 100%);
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
                radial-gradient(circle at 25px 25px, rgba(59, 130, 246, 0.1) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(30, 64, 175, 0.1) 2px, transparent 0);
            background-size: 100px 100px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-100 min-h-screen font-poppins">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-bold gradient-text">FestiPass</h1>
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Form Container -->
        <div id="requestForm" class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold gradient-text bg-clip-text text-transparent font-poppins mb-2">
                    Request Organizer Account
                </h2>
                <p class="text-gray-600 font-poppins">Fill out the form below to request organizer privileges</p>
            </div>
            
            <form action="{{ route('organizer.request.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700 font-poppins">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', Auth::user()->name ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 font-poppins bg-gray-50 focus:bg-white shadow-sm"
                        placeholder="Enter your full name"
                        required
                    >
                    @error('name')
                        <p class="text-sm text-red-600 font-poppins">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company Name Field -->
                <div class="space-y-2">
                    <label for="company_name" class="block text-sm font-semibold text-gray-700 font-poppins">
                        Company Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
                        value="{{ old('company_name') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 font-poppins bg-gray-50 focus:bg-white shadow-sm"
                        placeholder="Enter your company name"
                        required
                    >
                    @error('company_name')
                        <p class="text-sm text-red-600 font-poppins">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company Email Field -->
                <div class="space-y-2">
                    <label for="company_email" class="block text-sm font-semibold text-gray-700 font-poppins">
                        Company Email <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="company_email" 
                        name="company_email" 
                        value="{{ old('company_email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 font-poppins bg-gray-50 focus:bg-white shadow-sm"
                        placeholder="company@example.com"
                        required
                    >
                    @error('company_email')
                        <p class="text-sm text-red-600 font-poppins">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Information -->
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 font-poppins">
                        Tell us about your organization
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 font-poppins bg-gray-50 focus:bg-white shadow-sm resize-none"
                        placeholder="Describe your organization and why you need organizer privileges..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-600 font-poppins">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start space-x-3">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms" 
                        class="mt-1 w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                        required
                    >
                    <label for="terms" class="text-sm text-gray-600 font-poppins">
                        I agree to the <a href="#" class="text-purple-600 hover:text-purple-800 underline">Terms and Conditions</a> and understand that my request will be reviewed by the FestiPass team.
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button 
                        type="submit" 
                        class="w-full btn-gradient hover:from-purple-700 hover:to-blue-700 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-lg font-poppins"
                    >
                        Send Request
                    </button>
                </div>
            </form>
        </div>

        <!-- Success Message Container (Hidden by default) -->
        <div id="successMessage" class="hidden bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-r from-green-400 to-blue-500 mb-6">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 via-blue-500 to-indigo-600 bg-clip-text text-transparent font-poppins mb-4">
                    Request Organizer Account
                </h2>
                
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-bold mb-2 font-poppins">Your request has been sent!</h3>
                    <p class="text-blue-100 font-poppins">Kindly wait 1-2 weeks for verification and check your email!</p>
                </div>
                
                <button 
                    onclick="window.location.href='{{ route('profile.show') }}'"
                    class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-3 px-8 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-lg font-poppins"
                >
                    Back to Home
                </button>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        // Check if there's a success session
        @if(session('success'))
            document.getElementById('requestForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
        @endif

        // Form submission handling
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Sending Request...
            `;
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>
