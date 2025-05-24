<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Step 2</title>
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
    <style>
      /* Optional: Style for larger input text if desired for OTP codes */
      .otp-input {
        text-align: center;
        font-size: 1.5rem; /* Example size, adjust as needed */
        letter-spacing: 0.5rem; /* Example spacing, adjust as needed */
      }
    </style>
</head>
<body class="h-full">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="mx-auto text-center">
        <h1 class="font-poppins font-bold text-4xl text-indigo-600">FestiPass</h1>
      </div>
      <h2 class="mt-8 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        Enter Verification Code
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Please enter the 4-digit code. This code consists of the last 4 digits of your registered phone number.
      </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="#" method="POST"> {{-- Ganti action dengan route yang sesuai --}}
        {{-- Input untuk Kode Verifikasi --}}
        <div>
          <label for="verification_code" class="block text-sm font-medium leading-6 text-gray-900">Verification Code</label>
          <div class="mt-2">
            <input id="verification_code" name="verification_code" type="text" {{-- Bisa juga type="tel" --}}
                   required
                   class="block w-full rounded-md border-0 bg-white px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 otp-input"
                   maxlength="4"
                   minlength="4"
                   pattern="[A-Za-z0-9]{4}" {{-- Mengizinkan huruf dan angka, 4 karakter --}}
                   inputmode="text" {{-- Atau 'numeric' jika Anda yakin hanya angka --}}
                   autocomplete="one-time-code"
                   placeholder="----">
          </div>
        </div>

        {{-- Tombol Submit --}}
        <div>
          <button type="submit"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Verify & Proceed
          </button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Didn't receive a code or need to re-verify email?
        <a href="{{-- Ganti # dengan route ke halaman forgot password step 1 --}}"
           class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
          Start Over
        </a>
      </p>
    </div>
  </div>
</body>
</html>