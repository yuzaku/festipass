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
<body class="bg-gray-100 min-h-screen font-poppins">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-start items-center py-4">
                <h1 class="text-3xl font-bold gradient-text">FestiPass - Profile</h1>
            </div>
        </div>
    </header>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('info') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 gradient-text">My Profile</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Column - Personal Information -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold text-black mb-6 font-poppins">Personal Information</h3>
                
                <form id="profileForm" action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2 font-poppins">
                            Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed font-poppins"
                            readonly
                            disabled
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 font-poppins">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2 font-poppins">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed font-poppins"
                            readonly
                            disabled
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 font-poppins">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Telephone Field -->
                    <div>
                        <label for="tel_num" class="block text-sm font-medium text-gray-700 mb-2 font-poppins">
                            Telephone
                        </label>
                        <input 
                            type="tel" 
                            id="tel_num" 
                            name="tel_num" 
                            value="{{ old('tel_num', $user->formatted_phone) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed font-poppins"
                            readonly
                            disabled
                        >
                        @error('tel_num')
                            <p class="mt-1 text-sm text-red-600 font-poppins">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Account Type Section -->
                    <div class="space-y-4">
                        <h4 class="text-xl font-bold text-black font-poppins">Account Type</h4>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <select 
                                    id="is_organizer" 
                                    name="is_organizer" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed font-poppins"
                                    disabled
                                >
                                    <option value="0" {{ (!($user->is_organizer ?? false)) ? 'selected' : '' }}>Regular User</option>
                                    <option value="1" {{ ($user->is_organizer ?? false) ? 'selected' : '' }}>Organizer</option>
                                </select>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm font-poppins">Request Organizer Account? </span>
                                <!-- Ubah dari form POST menjadi link GET langsung -->
                                <a href="{{ route('organizer.request') }}" class="text-blue-600 hover:text-blue-800 underline text-sm font-poppins">
                                    Click Here!
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Language Section -->
                    <div class="space-y-4">
                        <h4 class="text-xl font-bold text-black font-poppins">Language</h4>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full border-2 border-gray-400 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-gray-600 font-poppins">English (US)</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 pt-6">
                        <button 
                            type="button" 
                            id="changeBtn"
                            class="px-6 py-2 btn-gradient text-white py-3 px-6 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg"
                        >
                            Change
                        </button>
                        <button 
                            type="submit" 
                            id="saveBtn"
                            class="bg-gray-400 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 cursor-not-allowed hidden font-poppins"
                            disabled
                        >
                            Save
                        </button>
                        <button 
                            type="button" 
                            id="cancelBtn"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 hidden font-poppins"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Column - Favourite Singer -->
            <div class="bg-white rounded-xl shadow-lg px-8 py-6">
                <h3 class="text-2xl font-bold mb-6 font-poppins">Favourite Singer</h3>
                <div class="flex flex-col gap-4">
                    <!-- Tulus -->
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg p-3 shadow-sm">
                        <img src="{{ asset('images/tulus.jpeg') }}" alt="Tulus" class="w-16 h-16 object-cover rounded-md mr-4 flex-shrink-0">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg font-poppins">Tulus</span>
                                <span class="text-blue-500 text-lg font-bold">♥♥♥♥</span>
                            </div>
                            <p class="text-sm text-gray-600 leading-tight mt-1">
                                Tulus is an Indonesian singer-songwriter known for his soulful voice and heartfelt lyrics, blending jazz, pop, and contemporary styles.
                            </p>
                        </div>
                    </div>
                    <!-- Bernadya -->
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg p-3 shadow-sm">
                        <img src="{{ asset('images/bernadya.jpeg') }}" alt="Bernadya" class="w-16 h-16 object-cover rounded-md mr-4 flex-shrink-0">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg font-poppins">Bernadya</span>
                                <span class="text-blue-500 text-lg font-bold">♥♥♥♥</span>
                            </div>
                            <p class="text-sm text-gray-600 leading-tight mt-1">
                                Bernadya is an Indonesian singer-songwriter known for her soothing voice and introspective lyrics, blending folk and pop influences to create heartfelt music.
                            </p>
                        </div>
                    </div>
                    <!-- Juicy Lucy -->
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg p-3 shadow-sm">
                        <img src="{{ asset('images/juicylucy.jpeg') }}" alt="Juicy Lucy" class="w-16 h-16 object-cover rounded-md mr-4 flex-shrink-0">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg font-poppins">Juicy Lucy</span>
                                <span class="text-blue-500 text-lg font-bold">♥♥♥♥</span>
                            </div>
                            <p class="text-sm text-gray-600 leading-tight mt-1">
                                Juicy Lucy is an Indonesian band known for their vibrant mix of soul, funk, and pop, delivering energetic performances and catchy, groove-filled tracks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changeBtn = document.getElementById('changeBtn');
            const saveBtn = document.getElementById('saveBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const formInputs = document.querySelectorAll('#profileForm input, #profileForm select');
            
            // Store original values
            const originalValues = {};
            formInputs.forEach(input => {
                originalValues[input.name] = input.value;
            });

            changeBtn.addEventListener('click', function() {
                // Enable form inputs
                formInputs.forEach(input => {
                    if (input.name !== 'is_organizer') { // Keep organizer field disabled
                        input.disabled = false;
                        input.readOnly = false;
                        input.classList.remove('bg-gray-50', 'text-gray-500', 'cursor-not-allowed');
                        input.classList.add('bg-white', 'text-gray-900');
                    }
                });

                // Toggle buttons
                changeBtn.classList.add('hidden');
                saveBtn.classList.remove('hidden', 'cursor-not-allowed', 'bg-gray-400');
                saveBtn.classList.add('bg-green-600', 'hover:bg-green-700');
                saveBtn.disabled = false;
                cancelBtn.classList.remove('hidden');
            });

            cancelBtn.addEventListener('click', function() {
                // Restore original values
                formInputs.forEach(input => {
                    input.value = originalValues[input.name];
                    input.disabled = true;
                    input.readOnly = true;
                    input.classList.add('bg-gray-50', 'text-gray-500', 'cursor-not-allowed');
                    input.classList.remove('bg-white', 'text-gray-900');
                });

                // Toggle buttons back
                changeBtn.classList.remove('hidden');
                saveBtn.classList.add('hidden', 'cursor-not-allowed', 'bg-gray-400');
                saveBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                saveBtn.disabled = true;
                cancelBtn.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
