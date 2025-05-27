<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Profile</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              // Menambahkan Poppins ke konfigurasi Tailwind CDN
              'poppins': ['Poppins', 'sans-serif'],
            }
          }
        }
      }
    </script>
    
    {{-- Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen font-poppins">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-purple-600 font-poppins">FestiPass - Profile</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-black mb-12 font-poppins">My Profile</h2>
        
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
                            value="{{ old('name', $user->name ?? 'Mas John Doe') }}"
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
                            value="{{ old('email', $user->email ?? 'johndoe@example.com') }}"
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
                            value="{{ old('tel_num', $user->tel_num ?? '+62    812345678') }}"
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
                                    <option value="0" {{ (!$user->is_organizer ?? true) ? 'selected' : '' }}>Regular User</option>
                                    <option value="1" {{ ($user->is_organizer ?? false) ? 'selected' : '' }}>Organizer</option>
                                </select>
                            </div>
                            <div>
                                <a href="#" class="text-purple-600 hover:text-purple-800 underline text-sm font-poppins">
                                    Request Organizer Account? Click Here!
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
                            class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 font-poppins"
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
<div class="bg-white rounded-lg shadow-lg p-8">
    <h3 class="text-2xl font-bold text-black mb-6 font-poppins">Favourite Singer</h3>
    
    <div class="space-y-6">
        <!-- Tulus -->
        <div class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg">
            <img 
                src="{{ asset('images/tulus.jpeg') }}" 
                alt="Tulus" 
                class="w-30 h-20 object-cover rounded-lg"
            >
            <div class="flex-1">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-xl font-bold text-black font-poppins">Tulus</h4>
                    <div class="flex space-x-1">
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 font-poppins">
                    Tulus is an Indonesian singer-songwriter known for his soulful voice and heartfelt lyrics, blending jazz, pop, and contemporary styles.
                </p>
            </div>
        </div>

        <!-- Bernadya -->
        <div class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg">
            <img 
                src="{{ asset('images/bernadya.jpeg') }}" 
                alt="Bernadya" 
                class="w-30 h-20 object-cover rounded-lg"
            >
            <div class="flex-1">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-xl font-bold text-black font-poppins">Bernadya</h4>
                    <div class="flex space-x-1">
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 font-poppins">
                    Bernadya is an Indonesian singer-songwriter known for her soothing voice and introspective lyrics, blending folk and pop influences to create heartfelt music.
                </p>
            </div>
        </div>

        <!-- Juicy Lucy -->
        <div class="flex items-start space-x-4 p-4 border border-gray-200 rounded-lg">
            <img 
                src="{{ asset('images/juicylucy.jpeg') }}" 
                alt="Juicy Lucy" 
                class="w-30 h-20 object-cover rounded-lg"
            >
            <div class="flex-1">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-xl font-bold text-black font-poppins">Juicy Lucy</h4>
                    <div class="flex space-x-1">
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-purple-500">♥</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 font-poppins">
                    Juicy Lucy is an Indonesian band known for their vibrant mix of soul, funk, and pop, delivering energetic performances and catchy, groove-filled tracks.
                </p>
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
