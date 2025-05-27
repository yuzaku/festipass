<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your Account</title>
    {{-- Menggunakan CDN Tailwind untuk kemudahan, ganti dengan setup Vite Anda jika perlu --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              // Menambahkan Poppins ke konfigurasi Tailwind CDN jika belum ada di setup Vite Anda
              'poppins': ['Poppins', 'sans-serif'],
            }
          }
        }
      }
    </script>
    {{-- Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body class="h-full">
 <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-purple-600 mb-2">FestiPass</h1>
                <h2 class="text-xl font-semibold text-gray-800">Create your new account</h2>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Username -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Username
                        </label>
                        <input type="text" 
                               id="name"
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Enter your username"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                               required 
                               maxlength="100" />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email address
                        </label>
                        <input type="email" 
                               id="email"
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Enter your email"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                               required />
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" 
                               id="password"
                               name="password" 
                               placeholder="Enter your password"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                               required />
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm Password
                        </label>
                        <input type="password" 
                               id="password_confirmation"
                               name="password_confirmation" 
                               placeholder="Confirm your password"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                               required />
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Telephone Number -->
                    <div>
                        <label for="tel_num" class="block text-sm font-medium text-gray-700 mb-2">
                            Telephone number
                        </label>
                        <input type="tel" 
                               id="tel_num"
                               name="tel_num" 
                               value="{{ old('tel_num') }}" 
                               placeholder="Enter your phone number"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                               required 
                               maxlength="15" />
                        @error('tel_num')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hidden field untuk is_organizer -->
                    <input type="hidden" name="is_organizer" value="0">

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-blue-600 hover:from-purple-600 hover:to-blue-700 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Register
                    </button>
                </form>

                <!-- Sign in link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Already a member? 
                        <a href="{{ route('login') }}" 
                           class="text-purple-600 hover:text-purple-800 font-medium hover:underline transition duration-200">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<style>
.btn-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
}
</style>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
      const telephoneInput = document.getElementById('telephone');

      if (telephoneInput) {
        telephoneInput.addEventListener('input', function (e) {
          // Menghapus semua karakter yang bukan angka
          e.target.value = e.target.value.replace(/[^0-9]/g, '');
        });
      }
    });
  </script>
</body>
</html>