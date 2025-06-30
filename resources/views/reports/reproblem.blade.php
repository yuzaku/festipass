<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Report Problem - FestiPass</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .btn-gradient {
      background: linear-gradient(to right, #667eea, #764ba2);
    }
    .btn-gradient:hover {
      background: linear-gradient(to right, #5a67d8, #6b46c1);
    }
    .gradient-text {
      background: linear-gradient(to right, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center border-b">
    <h1 class="text-2xl font-bold gradient-text">FestiPass</h1>
    <a href="{{ route('profile.show') }}" class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center hover:ring-2 ring-purple-400 transition">
      <i class="fas fa-user text-white"></i>
    </a>
  </header>

  <!-- Back Button -->
  <div class="px-6 mt-4">
    <a href="{{ route('my.tickets') }}"
       class="inline-flex items-center gap-2 px-4 py-2 text-white text-sm rounded-full btn-gradient shadow-md font-semibold">
      ⬅️ Back
    </a>
  </div>

  <!-- Form -->
  <main class="flex justify-center mt-10 px-4">
    <div class="w-full max-w-xl bg-gray-50 p-8 rounded-xl shadow">
      <h2 class="text-3xl font-bold gradient-text text-center mb-8">Report Problem</h2>

      <form id="reportForm" class="space-y-6">
        <div>
          <label class="block font-medium mb-1">Name</label>
          <input name="name" type="text" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300" />
        </div>
        <div>
          <label class="block font-medium mb-1">Problem Type</label>
          <input name="type" type="text" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300" />
        </div>
        <div>
          <label class="block font-medium mb-1">Details</label>
          <textarea name="details" rows="5" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300"></textarea>
        </div>
        <div>
          <label class="block font-medium mb-1">Insert File</label>
          <input name="file" type="file" class="w-full" />
        </div>
        <div class="text-center">
          <button type="submit"
            class="btn-gradient text-white py-2 px-6 rounded-full font-semibold hover:shadow-md transition">
            Send
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- SweetAlert JS -->
  <script>
    document.getElementById('reportForm').addEventListener('submit', function (e) {
      e.preventDefault(); // prevent real submission

      Swal.fire({
        icon: 'success',
        title: 'Your Report has been Sent!',
        confirmButtonText: 'OK',
        customClass: {
          popup: 'rounded-lg',
          confirmButton: 'bg-indigo-600 text-white px-4 py-2 rounded-full mt-4 font-semibold'
        }
      });

      e.target.reset();
    });
  </script>

  <!-- FontAwesome for icon (user) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
