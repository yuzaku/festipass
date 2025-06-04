<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Concert - FestiPass</title>
    {{-- Using Tailwind CSS CDN for this example --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>
<body class="bg-white font-sans">
    {{-- Kontainer utama halaman, tetap lebar agar header bisa maksimal --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <header class="flex flex-col sm:flex-row justify-between items-center mb-10 space-y-4 sm:space-y-0">
            <h1 class="text-2xl md:text-3xl font-bold text-purple-600">FestiPass</h1>
            <button class="w-full sm:w-auto border border-gray-300 rounded-full px-4 py-2 text-sm text-gray-700 flex items-center justify-center sm:justify-start">
                @auth
                    {{ auth()->user()->name }}
                @else
                    Regular User
                @endauth
                <span class="ml-2 bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center">
                    <i class="fas fa-user"></i>
                </span>
            </button>
        </header>

        <section class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-purple-700">Edit Concert</h2>
            <p class="text-gray-600 text-lg md:text-xl mt-1">Panic! at The Disco</p>
        </section>

        <section class="mb-10">
            <div class="max-w-xl mx-auto p-3 sm:p-4 bg-gray-100 rounded-lg shadow">
                <div class="flex justify-center">
                    <img src="https://images.squarespace-cdn.com/content/v1/6234e8b7aacc0141c3c4512e/2a2bba4e-ad05-4b96-b981-e7fbef11fea8/arch+new+map.jpg"
                         alt="Stage and Seating Plan"
                         class="w-full h-auto rounded">
                </div>
            </div>
        </section>

        {{-- PERUBAHAN: max-w-2xl diganti menjadi max-w-sm --}}
        <section class="space-y-4 mb-8 max-w-sm mx-auto">
            <div class="border border-gray-200 rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center mb-3 sm:mb-0">
                    <div class="bg-purple-500 text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                        <i class="fas fa-star text-xl md:text-2xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-base md:text-lg">REGULAR EARLY</p>
                        <p class="text-xs md:text-sm text-gray-500">30/30 SOLD</p>
                    </div>
                </div>
                <div class="flex items-center self-end sm:self-center">
                    <p class="text-purple-600 font-semibold mr-3 text-base md:text-lg">RP80K</p>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center mb-3 sm:mb-0">
                    <div class="bg-teal-500 text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                        <i class="fas fa-heart text-xl md:text-2xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-base md:text-lg">VIP EARLY</p>
                        <p class="text-xs md:text-sm text-gray-500">20/20 SOLD</p>
                    </div>
                </div>
                <div class="flex items-center self-end sm:self-center">
                    <p class="text-teal-600 font-semibold mr-3 text-base md:text-lg">RP110K</p>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center mb-3 sm:mb-0">
                    <div class="bg-green-500 text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center mr-3 sm:mr-4 text-xl md:text-2xl font-bold flex-shrink-0">
                        R
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-base md:text-lg">REGULAR</p>
                        <p class="text-xs md:text-sm text-gray-500">93/110 SOLD</p>
                    </div>
                </div>
                <div class="flex items-center self-end sm:self-center">
                    <p class="text-green-600 font-semibold mr-3 text-base md:text-lg">RP90K</p>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </div>
            </div>
        </section>

        <div class="flex justify-center mb-6">
            <button class="bg-purple-600 text-white rounded-full w-12 h-12 md:w-14 md:h-14 flex items-center justify-center text-2xl md:text-3xl shadow-lg hover:bg-purple-700 transition-colors duration-200">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <div class="flex justify-center">
            <button class="w-full sm:w-auto bg-purple-600 text-white font-semibold py-3 px-16 rounded-lg shadow-md hover:bg-purple-700 transition-colors duration-200 text-base md:text-lg">
                Save
            </button>
        </div>

        <footer class="text-center mt-12 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>