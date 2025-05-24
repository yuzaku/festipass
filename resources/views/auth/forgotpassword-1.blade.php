<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Step 1</title>
    {{-- Menggunakan CDN Tailwind untuk kemudahan, ganti dengan setup Vite Anda jika perlu --}}
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
    {{-- Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body class="h-full">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="mx-auto text-center">
        <h1 class="font-poppins font-bold text-4xl text-indigo-600">FestiPass</h1>
      </div>
      <h2 class="mt-8 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        Forgot Your Password?
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        No problem! Enter your email address below and we'll help you reset it.
      </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="#" method="POST"> {{-- Ganti action dengan route yang sesuai --}}
        {{-- Email address --}}
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required
                   class="block w-full rounded-md border-0 bg-white px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                   placeholder="you@example.com">
          </div>
        </div>

        {{-- Tombol Submit --}}
        <div>
          <button type="submit"
          href="{{ route('password.show.verification.form') }}"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Verify Email
          </button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Remembered your password?
        <a href="{{ route('login') }}"
           class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
          Sign in here
        </a>
      </p>
    </div>
  </div>
</body>
</html>