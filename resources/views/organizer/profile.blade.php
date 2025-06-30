<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Profile</title>
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
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.3);
        }
        .tab-active {
            border-bottom: 3px solid #667eea;
            color: #667eea;
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
                    <button onclick="history.back()" 
                       class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-left mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">My Profile</h1>
        </div>

        <!-- Navigation Tabs -->
        <div class="border-b border-gray-200 mb-8">
            <nav class="-mb-px flex space-x-8">
                <a href="{{ route('organizer.profile') }}" class="tab-active py-2 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                    Profile
                </a>
                <a href="{{ route('organizer.profile.reviews') }}" class="py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Reviews
                </a>
                <a href="{{ route('organizer.history') }}" class="py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Events History
                </a>
                <a href="{{ route('orgprofilehelp.index') }}" class="py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                    Help Center
                </a>
            </nav>
        </div>

        <!-- Profile Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Personal Information -->
            <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Personal Information</h2>
                
                <form class="space-y-6">
                    <!-- Organizer Name -->
                    <div>
                        <label for="organizer_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Organizer Name
                        </label>
                        <input type="text" 
                               id="organizer_name" 
                               name="organizer_name" 
                               value="Mas John Doe"
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>

                    <!-- Organizer Email -->
                    <div>
                        <label for="organizer_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Organizer Email
                        </label>
                        <input type="email" 
                               id="organizer_email" 
                               name="organizer_email" 
                               value="johndoe@example.com"
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>

                    <!-- Organizer Phone -->
                    <div>
                        <label for="organizer_tel" class="block text-sm font-medium text-gray-700 mb-2">
                            Organizer Phone
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                +62
                            </span>
                            <input type="tel" 
                                   id="organizer_tel" 
                                   name="organizer_tel" 
                                   value="812345678"
                                   class="form-input flex-1 px-4 py-3 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="••••••••"
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                            New Password
                        </label>
                        <input type="password" 
                               id="new_password" 
                               name="new_password" 
                               placeholder="Enter new password"
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm New Password
                        </label>
                        <input type="password" 
                               id="confirm_password" 
                               name="confirm_password" 
                               placeholder="Confirm new password"
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </form>
            </div>

            <!-- Account Settings -->
            <div class="space-y-6">
                <!-- Account Type -->
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Account Type</h2>
                    <div class="relative">
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent appearance-none bg-white">
                            <option selected>Organizer Account</option>
                            <option>Regular Account</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Language -->
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Language</h2>
                    <div class="relative">
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent appearance-none bg-white">
                            <option selected>EN English (US)</option>
                            <option>ID Bahasa Indonesia</option>
                            <option>JP 日本語</option>
                            <option>KR 한국어</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="button" 
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 btn-gradient text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-edit mr-2"></i>
                        Change
                    </button>
                    <button type="button" 
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form animations
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.01)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Button click effects
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Demo functionality for Change and Save buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => {
                if (btn.textContent.trim() === 'Change') {
                    btn.addEventListener('click', function() {
                        alert('Change functionality will be implemented soon!');
                    });
                } else if (btn.textContent.trim() === 'Save') {
                    btn.addEventListener('click', function() {
                        alert('Profile saved successfully! (Demo)');
                    });
                }
            });
        });
    </script>
</body>
</html>