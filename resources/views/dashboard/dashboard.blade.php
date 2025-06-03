<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FestiPass</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet"/>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body class="bg-white font-sans">
  <!-- Navbar -->
  <header class="flex justify-between items-center p-4 border-b">
    <div class="flex items-center gap-4">
      <div class="text-2xl font-bold text-blue-600">FestiPass</div>
      <button class="bg-blue-600 text-white px-4 py-2 rounded-md">My Tickets</button>
    </div>
    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
  </header>

  <!-- Hero Section -->
  <section class="text-center py-10 px-4">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold text-purple-800 mb-4">Every Concert, One Click Away.</h1>

      <!-- Search Bar -->
      <div class="flex justify-center items-center gap-2 mb-4 flex-wrap">
        <input type="text" placeholder="Search by events, name, location, and more" class="w-full md:w-2/3 px-4 py-2 border rounded-md" />
        <button class="bg-black text-white px-4 py-2 rounded-md">🔍</button>
      </div>

      <!-- Dropdown Kota -->
      <div class="max-w-md mx-auto mb-6">
        <label for="city" class="block text-sm font-medium mb-1 text-left">Filter by City</label>
        <select id="city" class="w-full px-4 py-2 border rounded-md">
          <option>All Cities</option>
          <option>Surabaya</option>
          <option>Jakarta</option>
        </select>
      </div>

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
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
        </div>

        <div class="swiper now-showing">
          <div class="swiper-wrapper">
            <!-- Slide Item -->
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://wp.dailybruin.com/images/2019/02/PATD.ADX_14.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 01</p>
        <h3 class="text-lg font-semibold">Panic! at the Disco</h3>
        <p class="text-sm">Rp. 450.000 - 975.000</p>
        <p class="text-sm text-gray-500">📍 The Icon, BSD</p>
        </div>
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://musicazero.com/wp-content/uploads/2019/05/Hamilton-Logo.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 02</p>
        <h3 class="text-lg font-semibold">Hamilton the Musical</h3>
        <p class="text-sm">Rp. 1.500.000 - 3.000.000</p>
        <p class="text-sm text-gray-500">📍 Ciputra Artpreneur</p>
        </div>
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://th.bing.com/th/id/OIP.Iv3Vn6HNZZtLcTJulNcpPgHaFa?cb=iwp2&rs=1&pid=ImgDetMain" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 03</p>
        <h3 class="text-lg font-semibold">Anastasia the Musical</h3>
        <p class="text-sm">Rp. 850.000 - 3.000.000</p>
        <p class="text-sm text-gray-500">📍 The Icon, BSD</p>
        </div>
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://i.pinimg.com/originals/ec/3c/71/ec3c719e3fd73e168907514c9204c767.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 04</p>
        <h3 class="text-lg font-semibold">My Chemical Romance</h3>
        <p class="text-sm">Free</p>
        <p class="text-sm text-gray-500">📍 BXchange, BSD</p>
        </div>
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://i.pinimg.com/originals/4d/60/6f/4d606fa21b943c680ce30d3f4632a783.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 05</p>
        <h3 class="text-lg font-semibold">Paramore</h3>
        <p class="text-sm">Rp. 450.000 - 975.000</p>
        <p class="text-sm text-gray-500">📍 Tunjungan Plaza, Surabaya</p>
        </div>
        <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://th.bing.com/th/id/OIP.qtHwOE9dlJa-j3d9pz-sRQHaFQ?cb=iwp2&rs=1&pid=ImgDetMain" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 06</p>
        <h3 class="text-lg font-semibold">Linkin Park</h3>
        <p class="text-sm">Free</p>
        <p class="text-sm text-gray-500">📍 Jatim Expo, Surabaya</p>
        </div>
          </div>
        </div>

        <div class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10">
          <button class="now-next bg-white border shadow-md rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Coming Soon -->
      <h2 class="text-2xl font-bold text-left mb-4">Coming Soon</h2>
      <div class="relative mb-8">
        <div class="absolute -left-6 top-1/2 transform -translate-y-1/2 z-10">
          <button class="coming-prev bg-white border shadow-md rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
        </div>

        <div class="swiper coming-soon">
          <div class="swiper-wrapper">
            <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://i.pinimg.com/originals/7e/0e/f3/7e0ef3859e00c6bdb8a6961fd571d53d.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 10</p>
        <h3 class="text-lg font-semibold">The Script Live</h3>
        <p class="text-sm">Rp. 600.000 - 1.200.000</p>
        <p class="text-sm text-gray-500">📍 Istora Senayan</p>
      </div>
      <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://www.nme.com/wp-content/uploads/2023/01/2023_coldplay_getty_2000x1270.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 12</p>
        <h3 class="text-lg font-semibold">Coldplay</h3>
        <p class="text-sm">Rp. 1.000.000 - 2.500.000</p>
        <p class="text-sm text-gray-500">📍 GBK Jakarta</p>
      </div>
      <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://townsquare.media/site/366/files/2021/09/attachment-imagine_dragons_2019.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 13</p>
        <h3 class="text-lg font-semibold">Imagine Dragon</h3>
        <p class="text-sm">Rp. 1.500.000 - 2.500.000</p>
        <p class="text-sm text-gray-500">📍 Jatim Expo, Surabaya</p>
      </div>
      <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://www.rollingstone.com/wp-content/uploads/2020/02/TheWeeknd.jpg" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 14</p>
        <h3 class="text-lg font-semibold">The Weeknd</h3>
        <p class="text-sm">Rp. 1.000.000 - 2.500.000</p>
        <p class="text-sm text-gray-500">📍 Tunjungan Plaza, Surabaya</p>
      </div>
      <div class="swiper-slide w-64 bg-white shadow-md rounded-md p-4">
        <img src="https://th.bing.com/th/id/OIP.7S3ItpPQOZ08bU_VB2IdegHaEK?cb=iwp2&rs=1&pid=ImgDetMain" alt="" class="w-full h-40 object-cover rounded-md mb-2">
        <p class="text-sm text-gray-600">NOV 15</p>
        <h3 class="text-lg font-semibold">Daft Punk</h3>
        <p class="text-sm">Rp. 1.000.000 - 2.500.000</p>
        <p class="text-sm text-gray-500">📍 GBK Jakarta</p>
      </div>
          </div>
        </div>

        <div class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10">
          <button class="coming-next bg-white border shadow-md rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </section>

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
