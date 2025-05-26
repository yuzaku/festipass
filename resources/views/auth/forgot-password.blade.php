<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Forgot Password - FestiPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-purple-600 mb-2">FestiPass</h1>
                <h2 class="text-xl font-semibold text-gray-800">Reset your password</h2>
                <p class="text-gray-600 mt-2">Enter your email address to continue</p>
            </div>

            <!-- Email Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form id="emailForm" method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            required />
                        <div id="emailError" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>

                    <button type="submit" id="submitBtn"
                        class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-blue-600 hover:from-purple-600 hover:to-blue-700 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        <span id="submitText">Continue</span>
                        <span id="submitLoader" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </form>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Remember your password? 
                        <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-medium hover:underline transition duration-200">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Verification Code Modal -->
    <div id="verificationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-40">
        <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md mx-4 transform transition-all">
            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-purple-100 mb-4">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Enter Verification Code</h3>
            </div>

            <form id="verificationForm" method="POST" action="{{ route('password.verify.code') }}">
                @csrf
                <input type="hidden" id="hiddenEmail" name="email" value="">
                
                <div class="mb-6">
                    <label for="verification_code" class="block text-sm font-medium text-gray-700 mb-3 text-center">Verification Code</label>
                    <div class="flex space-x-3 justify-center">
                        <input type="text" maxlength="1" id="digit1" oninput="moveToNext(this, 'digit2')" onkeydown="moveToPrev(this, null, event)" onpaste="handlePaste(event)"
                            class="w-14 h-14 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" />
                        <input type="text" maxlength="1" id="digit2" oninput="moveToNext(this, 'digit3')" onkeydown="moveToPrev(this, 'digit1', event)"
                            class="w-14 h-14 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" />
                        <input type="text" maxlength="1" id="digit3" oninput="moveToNext(this, 'digit4')" onkeydown="moveToPrev(this, 'digit2', event)"
                            class="w-14 h-14 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" />
                        <input type="text" maxlength="1" id="digit4" oninput="moveToNext(this, null)" onkeydown="moveToPrev(this, 'digit3', event)"
                            class="w-14 h-14 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" />
                    </div>
                    <input type="hidden" name="verification_code" id="fullCode">
                    <div id="codeError" class="text-red-500 text-sm mt-3 text-center hidden"></div>
                </div>

                <div class="flex space-x-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold rounded-lg transition duration-200">Cancel</button>
                    <button type="submit" id="verifyBtn" class="flex-1 py-3 px-4 bg-gradient-to-r from-purple-500 to-blue-600 hover:from-purple-600 hover:to-blue-700 text-white font-semibold rounded-lg transition duration-200">
                        <span id="verifyText">Verify</span>
                        <span id="verifyLoader" class="hidden">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Verifying...
                        </span>
                    </button>
                </div>
            </form>

            <div class="text-center mt-6">
                <p class="text-xs text-gray-500 mb-2">Kode verifikasi adalah 4 digit terakhir nomor telepon yang terdaftar di akun Anda</p>
                <button type="button" onclick="showHelpModal()" class="text-sm text-purple-600 hover:text-purple-800 hover:underline transition duration-200">Need help?</button>
            </div>
        </div>
    </div>

    <!-- Help Modal -->
    <div id="helpModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm mx-4">
            <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Bantuan Verifikasi</h4>
                <p class="text-sm text-gray-600 mb-4">Kode verifikasi adalah <strong>4 digit terakhir</strong> dari nomor telepon yang Anda daftarkan saat membuat akun.</p>
                <p class="text-xs text-gray-500 mb-4">Contoh: Jika nomor telepon Anda 081234567890, maka kode verifikasinya adalah <strong>7890</strong></p>
                <button type="button" onclick="closeHelpModal()" class="w-full py-2 px-4 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition duration-200">Mengerti</button>
            </div>
        </div>
    </div>

    <script>
        // Email form submit
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitLoader = document.getElementById('submitLoader');
            const emailError = document.getElementById('emailError');
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            submitLoader.classList.remove('hidden');
            emailError.classList.add('hidden');
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('hiddenEmail').value = email;
                    showModal();
                } else {
                    emailError.textContent = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                    emailError.classList.remove('hidden');
                }
            })
            .catch(error => {
                emailError.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                emailError.classList.remove('hidden');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                submitLoader.classList.add('hidden');
            });
        });

        // Verification form submit
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const code = getFullCode();
            if (code.length !== 4) {
                showCodeError('Silakan masukkan semua 4 digit');
                return;
            }
            const verifyBtn = document.getElementById('verifyBtn');
            const verifyText = document.getElementById('verifyText');
            const verifyLoader = document.getElementById('verifyLoader');
            verifyBtn.disabled = true;
            verifyText.classList.add('hidden');
            verifyLoader.classList.remove('hidden');
            document.getElementById('fullCode').value = code;
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect_url || '{{ route("password.reset") }}';
                } else {
                    showCodeError(data.message || 'Kode verifikasi salah');
                    shakeDigits();
                }
            })
            .catch(error => {
                showCodeError('Terjadi kesalahan. Silakan coba lagi.');
            })
            .finally(() => {
                verifyBtn.disabled = false;
                verifyText.classList.remove('hidden');
                verifyLoader.classList.add('hidden');
            });
        });

        // Modal functions
        function showModal() {
            document.getElementById('verificationModal').classList.remove('hidden');
            document.getElementById('verificationModal').classList.add('flex');
            setTimeout(() => {
                document.getElementById('digit1').focus();
            }, 100);
        }
        function closeModal() {
            document.getElementById('verificationModal').classList.add('hidden');
            document.getElementById('verificationModal').classList.remove('flex');
            clearDigits();
        }
        function showHelpModal() {
            document.getElementById('helpModal').classList.remove('hidden');
            document.getElementById('helpModal').classList.add('flex');
        }
        function closeHelpModal() {
            document.getElementById('helpModal').classList.add('hidden');
            document.getElementById('helpModal').classList.remove('flex');
        }

        // Digit input functions
        function moveToNext(current, nextId) {
            if (current.value.length === 1 && nextId) {
                document.getElementById(nextId).focus();
            }
            hideCodeError();
        }
        function moveToPrev(current, prevId, event) {
            if (event.key === 'Backspace' && current.value === '' && prevId) {
                document.getElementById(prevId).focus();
            }
        }
        function handlePaste(event) {
            event.preventDefault();
            const paste = (event.clipboardData || window.clipboardData).getData('text');
            const digits = paste.replace(/\D/g, '').slice(0, 4);
            for (let i = 0; i < 4; i++) {
                const input = document.getElementById(`digit${i + 1}`);
                input.value = digits[i] || '';
            }
            if (digits.length === 4) {
                document.getElementById('digit4').focus();
            }
        }
        function getFullCode() {
            return document.getElementById('digit1').value + 
                   document.getElementById('digit2').value + 
                   document.getElementById('digit3').value + 
                   document.getElementById('digit4').value;
        }
        function clearDigits() {
            document.getElementById('digit1').value = '';
            document.getElementById('digit2').value = '';
            document.getElementById('digit3').value = '';
            document.getElementById('digit4').value = '';
            hideCodeError();
        }
        function showCodeError(message) {
            document.getElementById('codeError').textContent = message;
            document.getElementById('codeError').classList.remove('hidden');
        }
        function hideCodeError() {
            document.getElementById('codeError').classList.add('hidden');
        }
        function shakeDigits() {
            const digits = document.querySelectorAll('[id^="digit"]');
            digits.forEach(digit => {
                digit.classList.add('animate-pulse');
                digit.style.borderColor = '#ef4444';
                setTimeout(() => {
                    digit.classList.remove('animate-pulse');
                    digit.style.borderColor = '';
                }, 500);
            });
        }
        document.querySelectorAll('[id^="digit"]').forEach(input => {
            input.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            input.addEventListener('focus', function() {
                this.select();
            });
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('helpModal').classList.contains('hidden')) {
                    closeHelpModal();
                } else if (!document.getElementById('verificationModal').classList.contains('hidden')) {
                    closeModal();
                }
            }
        });
    </script>
</body>
</html>
