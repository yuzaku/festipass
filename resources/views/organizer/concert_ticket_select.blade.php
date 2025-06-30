<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Select Concert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</head>
<body class="h-full">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Select Concert to Manage Tickets
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @if($concerts->count() > 0)
                    <div class="space-y-4">
                        @foreach($concerts as $concert)
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $concert->title }}</h3>
                                        <p class="text-sm text-gray-600">{{ $concert->artist }}</p>
                                        <p class="text-sm text-gray-500">
                                            <i class="fas fa-ticket-alt mr-1"></i>
                                            {{ $concert->tickets->count() }} ticket types
                                        </p>
                                    </div>
                                    <a href="{{ route('manageconcertticket.show') }}?concert_id={{ $concert->id }}" 
                                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <i class="fas fa-edit mr-2"></i>
                                        Manage Tickets
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center">
                        <i class="fas fa-music text-gray-400 text-6xl mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No concerts found</h3>
                        <p class="text-gray-600">Create a concert first before managing tickets.</p>
                        <a href="{{ route('organizer.concerts.create') }}" 
                           class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            <i class="fas fa-plus mr-2"></i>
                            Create Concert
                        </a>
                    </div>
                @endif
                
                <div class="mt-6 text-center">
                    <a href="{{ route('organizer.concerts') }}" 
                       class="text-indigo-600 hover:text-indigo-500 font-medium">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Back to Concerts
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>