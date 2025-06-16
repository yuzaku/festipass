<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Report | FestiPass</title>
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
  </style>
</head>
<body class="bg-white font-poppins">
  <!-- Header -->
  <header class="flex justify-between items-center p-4 border-b">
    <div class="flex items-center gap-4">
      <div class="text-2xl font-bold gradient-text">FestiPass</div>
      <a href="/dashboard" class="btn-gradient text-white px-4 py-2 rounded-md">Dashboard</a>
    </div>
    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
  </header>

  <!-- Sales Report -->
  <section class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 gradient-text">Sales Report</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white p-6 rounded-xl shadow-md border">
        <p class="text-sm text-gray-500">Total Sales</p>
        <h2 class="text-2xl font-semibold">Rp. 12.500.000</h2>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md border">
        <p class="text-sm text-gray-500">Tickets Sold</p>
        <h2 class="text-2xl font-semibold">835 Tickets</h2>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md border">
        <p class="text-sm text-gray-500">Events Hosted</p>
        <h2 class="text-2xl font-semibold">12 Events</h2>
      </div>
    </div>

    <!-- Table -->
    <div class="overflow-auto rounded-xl border">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-4 font-semibold">Event</th>
            <th class="px-6 py-4 font-semibold">Date</th>
            <th class="px-6 py-4 font-semibold">Location</th>
            <th class="px-6 py-4 font-semibold">Tickets Sold</th>
            <th class="px-6 py-4 font-semibold">Revenue</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="px-6 py-4">Panic! at the Disco</td>
            <td class="px-6 py-4">01 Nov 2025</td>
            <td class="px-6 py-4">The Icon, BSD</td>
            <td class="px-6 py-4">250</td>
            <td class="px-6 py-4">Rp. 2.000.000</td>
          </tr>
          <tr class="border-t">
            <td class="px-6 py-4">Hamilton the Musical</td>
            <td class="px-6 py-4">02 Nov 2025</td>
            <td class="px-6 py-4">Ciputra Artpreneur</td>
            <td class="px-6 py-4">300</td>
            <td class="px-6 py-4">Rp. 5.000.000</td>
          </tr>
          <tr class="border-t">
            <td class="px-6 py-4">Paramore</td>
            <td class="px-6 py-4">05 Nov 2025</td>
            <td class="px-6 py-4">Tunjungan Plaza</td>
            <td class="px-6 py-4">150</td>
            <td class="px-6 py-4">Rp. 1.500.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</body>
</html>
