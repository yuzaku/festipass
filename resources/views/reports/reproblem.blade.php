<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Report Problem - FestiPass</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-white text-gray-800">

  <!-- Header -->
  <header class="bg-gray-100 shadow-sm py-4 px-6 flex justify-between items-center">
    <h1 class="text-2xl font-extrabold text-indigo-600">FestiPass</h1>
    <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </div>
  </header>

  <!-- Form -->
  <main class="flex justify-center mt-10 px-4">
    <div class="w-full max-w-xl">
      <h2 class="text-3xl font-extrabold text-indigo-600 text-center mb-10">Report Problem</h2>

      <form id="reportForm" class="space-y-6">
        <div>
          <label class="block font-medium mb-1">Name</label>
          <input name="name" type="text" required class="w-full border rounded-md px-4 py-2" />
        </div>
        <div>
          <label class="block font-medium mb-1">Problem Type</label>
          <input name="type" type="text" required class="w-full border rounded-md px-4 py-2" />
        </div>
        <div>
          <label class="block font-medium mb-1">Details</label>
          <textarea name="details" rows="5" required class="w-full border rounded-md px-4 py-2"></textarea>
        </div>
        <div>
          <label class="block font-medium mb-1">Insert File</label>
          <input name="file" type="file" />
        </div>
        <div class="text-center">
          <button type="submit"
            class="bg-indigo-600 text-white py-2 px-6 rounded-full hover:bg-indigo-700 transition font-semibold text-sm">
            Send
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- JS: Handle popup & reset -->
  <script>
    document.getElementById('reportForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Jangan kirim ke server

      Swal.fire({
        icon: 'success',
        title: 'Your Report has been Sent!',
        confirmButtonText: 'OK',
        customClass: {
          popup: 'rounded-lg',
          confirmButton: 'bg-indigo-600 text-white px-4 py-2 rounded-full mt-4'
        }
      });

      // Reset form
      e.target.reset();
    });
  </script>

</body>
</html>
