<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Ticket - FestiPass</title>
    {{-- Menggunakan Tailwind CSS CDN untuk contoh ini --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans"> {{-- Latar belakang putih --}}
    {{-- Kontainer utama halaman, lebar untuk header --}}
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

        {{-- Kontainer untuk konten form, bisa lebih sempit dan terpusat --}}
        <div class="max-w-lg mx-auto">
            {{-- Sub-header untuk "Adding Ticket" --}}
            <div class="text-right mb-4">
                <span class="text-sm text-gray-500">Adding Ticket</span>
            </div>

            <section class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-purple-700">Edit Concert</h2>
                {{-- Anda bisa menambahkan subjudul artis di sini jika ingin konsisten --}}
                {{-- <p class="text-gray-600 text-lg md:text-xl mt-1">Panic! at The Disco</p> --}}
            </section>

            <form action="#" method="POST" class="space-y-6"> {{-- Ganti action dan method sesuai kebutuhan backend --}}
                {{-- @csrf --}} {{-- Tambahkan jika ini form Laravel --}}

                <div>
                    <label for="ticket_category_name" class="block text-sm font-medium text-gray-700">Ticket Category Name</label>
                    <input type="text" name="ticket_category_name" id="ticket_category_name" value="VVIP"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-gray-900 placeholder-gray-400">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" value="Rp. 150.000"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-gray-900 placeholder-gray-400">
                </div>

                <div>
                    <label for="quota" class="block text-sm font-medium text-gray-700">Quota</label>
                    <input type="number" name="quota" id="quota" value="5"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-gray-900 placeholder-gray-400">
                </div>

                {{-- Seat Option Section --}}
                <div class="pt-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-1">Seat Option</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="row" class="block text-sm font-medium text-gray-700">Row</label>
                            <input type="text" name="row" id="row" value="I"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-gray-900 placeholder-gray-400">
                        </div>
                        <div>
                            <label for="column" class="block text-sm font-medium text-gray-700">Column</label>
                            <input type="text" name="column" id="column" value="2-6"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-gray-900 placeholder-gray-400">
                        </div>
                    </div>
                </div>

                {{-- Tombol Next --}}
                <div class="flex justify-end pt-4">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Next
                    </button>
                </div>
            </form>
            {{-- Akhir Form --}}
        </div> {{-- Akhir dari kontainer konten form --}}

        <footer class="text-center mt-12 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Ticket - FestiPass</title>
    {{-- Menggunakan Tailwind CSS CDN untuk contoh ini --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Jika Anda menggunakan Vite di proyek Laravel Anda: --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 font-sans text-white"> {{-- Latar belakang gelap seperti di screenshot --}}
    {{-- Kontainer utama --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-lg"> {{-- max-w-lg agar form tidak terlalu lebar --}}

        <header class="flex flex-row justify-between items-center mb-4">
            <h1 class="text-2xl md:text-3xl font-bold text-white">FestiPass</h1>
            <button class="border border-gray-600 rounded-full px-4 py-2 text-sm text-gray-300 flex items-center justify-center sm:justify-start hover:bg-gray-700">
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

        {{-- Sub-header untuk "Adding Ticket" --}}
        <div class="text-right mb-8">
            <span class="text-sm text-gray-400">Adding Ticket</span>
        </div>

        <section class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-white">Edit Concert</h2>
            {{-- Anda bisa menambahkan subjudul artis jika perlu, seperti di panel kiri --}}
            {{-- <p class="text-gray-400 text-lg md:text-xl mt-1">Panic! at The Disco</p> --}}
        </section>

        <form action="#" method="POST" class="space-y-6"> {{-- Ganti action dan method sesuai kebutuhan backend --}}
            {{-- @csrf --}} {{-- Tambahkan jika ini form Laravel --}}

            <div>
                <label for="ticket_category_name" class="block text-sm font-medium text-gray-300">Ticket Category Name</label>
                <input type="text" name="ticket_category_name" id="ticket_category_name" value="VVIP"
                       class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-white placeholder-gray-500">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-300">Price</label>
                <input type="text" name="price" id="price" value="Rp. 150.000"
                       class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-white placeholder-gray-500">
            </div>

            <div>
                <label for="quota" class="block text-sm font-medium text-gray-300">Quota</label>
                <input type="number" name="quota" id="quota" value="5"
                       class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-white placeholder-gray-500">
            </div>

            {{-- Seat Option Section --}}
            <div class="pt-4">
                <h3 class="text-lg font-medium leading-6 text-gray-200 mb-1">Seat Option</h3>
                <div class="space-y-4">
                    <div>
                        <label for="row" class="block text-sm font-medium text-gray-300">Row</label>
                        <input type="text" name="row" id="row" value="I"
                               class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-white placeholder-gray-500">
                    </div>
                    <div>
                        <label for="column" class="block text-sm font-medium text-gray-300">Column</label>
                        <input type="text" name="column" id="column" value="2-6"
                               class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm text-white placeholder-gray-500">
                    </div>
                </div>
            </div>

            {{-- Tombol Next --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-900">
                    Next
                </button>
            </div>
        </form>
        {{-- Akhir Form --}}

        <footer class="text-center mt-12 py-4 border-t border-gray-700">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} FestiPass. All rights reserved.</p>
        </footer>
    </div>
</body>
</html> -->