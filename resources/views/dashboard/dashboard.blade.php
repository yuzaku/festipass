<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass</title>
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
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
<body class="bg-white font-poppins">

    <!-- Navbar -->
    <header class="flex justify-between items-center p-4 border-b">
    <div class="flex items-center gap-4">
        <div class="text-2xl font-bold gradient-text">FestiPass</div>
        <a href="{{ route('my.tickets') }}" class="btn-gradient text-white px-4 py-2 rounded-md">My Tickets</a>
    </div>
    <!-- Avatar link -->
    <a href="{{ route('profile.show') }}" class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center hover:ring-2 ring-purple-400 transition">
    <i class="fas fa-user text-white"></i>
    </a>
    </header>

    <!-- Hero Section -->
    <section class="text-center py-10 px-4 hero-pattern">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold gradient-text mb-4">Every Concert, One Click Away.</h1>

            <!-- Search -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex justify-center items-center gap-2 mb-4 flex-wrap">
    <input type="text" name="search" placeholder="Search by events, name, location, and more"
        value="{{ request('search') }}"
        class="w-full md:w-2/3 px-4 py-2 border rounded-md" />
    <button type="submit" class="btn-gradient text-white px-4 py-2 rounded-md">🔍</button>
</form>


            <!-- Filter Tags -->
            <div class="flex justify-center gap-4 flex-wrap mb-8">
                <button class="bg-purple-200 px-4 py-2 rounded-full">Artist</button>
                <button class="bg-purple-200 px-4 py-2 rounded-full">Genre</button>
                <button class="bg-purple-200 px-4 py-2 rounded-full">Location</button>
                <button class="bg-purple-200 px-4 py-2 rounded-full">Price</button>
            </div>

            <!-- Now Showing -->
<h2 class="text-2xl font-bold text-left mb-4">Now Showing</h2>
<div class="relative mb-8">
  <div class="absolute -left-6 top-1/2 transform -translate-y-1/2 z-10">
    <button class="now-prev bg-white border shadow-md rounded-full p-2">
      <i class="fas fa-chevron-left text-gray-700"></i>
    </button>
  </div>

  <div class="swiper now-showing">
    <div class="swiper-wrapper">
      @foreach ($nowShowing as $event)
        <a href="{{ url('/select-ticket/' . $event->id) }}" class="swiper-slide w-64 bg-white shadow-md rounded-md p-4 card-hover block">
          <img src="{{ asset($event->poster) }}" alt="" class="w-full h-40 object-cover rounded-md mb-2">
          <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($event->event_date)->format('M d') }}</p>
          <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
          <p class="text-sm">{{ $event->price }}</p>
          <p class="text-sm text-gray-500">📍 {{ $event->location }}</p>
        </a>
      @endforeach
    </div>
  </div>

  <div class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10">
    <button class="now-next bg-white border shadow-md rounded-full p-2">
      <i class="fas fa-chevron-right text-gray-700"></i>
    </button>
  </div>
</div>

<!-- Coming Soon -->
<h2 class="text-2xl font-bold text-left mb-4">Coming Soon</h2>
<div class="relative mb-8">
  <div class="absolute -left-6 top-1/2 transform -translate-y-1/2 z-10">
    <button class="coming-prev bg-white border shadow-md rounded-full p-2">
      <i class="fas fa-chevron-left text-gray-700"></i>
    </button>
  </div>

  <div class="swiper coming-soon">
    <div class="swiper-wrapper">
      @foreach ($comingSoon as $event)
        <a href="{{ url('/select-ticket/' . $event->id) }}" class="swiper-slide w-64 bg-white shadow-md rounded-md p-4 card-hover block">
          <img src="{{ asset($event->poster) }}" alt="" class="w-full h-40 object-cover rounded-md mb-2">
          <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($event->event_date)->format('M d') }}</p>
          <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
          <p class="text-sm">{{ $event->price }}</p>
          <p class="text-sm text-gray-500">📍 {{ $event->location }}</p>
        </a>
      @endforeach
    </div>
  </div>

  <div class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10">
    <button class="coming-next bg-white border shadow-md rounded-full p-2">
      <i class="fas fa-chevron-right text-gray-700"></i>
    </button>
  </div>
</div>

    <!-- Swiper Init -->
    <script>
      new Swiper('.now-showing', {
        slidesPerView: 4,
        spaceBetween: 16,
        grabCursor: true,
        navigation: {
          nextEl: '.now-next',
          prevEl: '.now-prev',
        },
        breakpoints: {
          0: { slidesPerView: 1.2 },
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 4 }
        }
      });

      new Swiper('.coming-soon', {
        slidesPerView: 4,
        spaceBetween: 16,
        grabCursor: true,
        navigation: {
          nextEl: '.coming-next',
          prevEl: '.coming-prev',
        },
        breakpoints: {
          0: { slidesPerView: 1.2 },
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 4 }
        }
      });
    </script>

</body>
</html>
