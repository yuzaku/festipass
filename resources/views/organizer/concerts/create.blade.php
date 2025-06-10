<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FestiPass - Add Concert</title>
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
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.3);
        }
        .upload-area {
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            border-color: #667eea;
            background-color: #f8faff;
        }
        .upload-area.dragover {
            border-color: #667eea;
            background-color: #f0f4ff;
        }
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25px 25px, rgba(102, 126, 234, 0.1) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(118, 75, 162, 0.1) 2px, transparent 0);
            background-size: 100px 100px;
        }
    </style>
</head>
<body class="bg-gray-50 font-poppins">
    <!-- Header Navigation -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('organizer.dashboard') }}" class="text-3xl font-bold gradient-text">FestiPass</a>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('organizer.concerts') }}" 
                       class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Concerts
                    </a>
                    <a href="{{ route('organizer.reports') }}" 
                       class="inline-flex items-center px-4 py-2 border border-purple-500 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition duration-200">
                        <i class="fas fa-chart-line mr-2"></i>
                        Sales Reports
                    </a>
                    <!-- Organizer Profile -->
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600">Organizer</span>
                        <a href="{{ route('organizer.profile') }}" 
                           class="w-10 h-10 btn-gradient rounded-full flex items-center justify-center text-white transition duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12 hero-pattern py-16 rounded-2xl relative overflow-hidden">
            <div class="flex justify-center mb-4">
                <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    <i class="fas fa-plus-circle text-blue-400 mr-2 text-xs"></i>
                    Create New Concert
                </div>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-4">
                Add Concert
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Create a new concert event and start selling tickets to music fans worldwide.
            </p>

            <!-- Progress Steps -->
            <div class="flex items-center justify-center space-x-4 max-w-2xl mx-auto">
                <div class="flex items-center">
                    <div class="w-8 h-8 btn-gradient rounded-full flex items-center justify-center text-white text-sm font-bold">1</div>
                    <span class="ml-2 text-sm font-medium text-gray-700">Concert Details</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 text-sm font-bold">2</div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Ticket Pricing</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 text-sm font-bold">3</div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Publish</span>
                </div>
            </div>
        </div>

        <!-- Concert Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <form action="{{ route('organizer.concerts.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <!-- Concert Name -->
                <div class="mb-8">
                    <label for="name" class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-music mr-2 text-purple-600"></i>
                        Concert Name
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           placeholder="e.g., Rock Festival Jakarta 2025"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
                    <p class="text-sm text-gray-500 mt-2">Choose an engaging name that attracts your target audience</p>
                </div>

                <!-- Location -->
                <div class="mb-8">
                    <label for="location" class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>
                        Location
                    </label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           placeholder="e.g., Jakarta International Expo, Kemayoran"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
                    <p class="text-sm text-gray-500 mt-2">Include venue name and area for better searchability</p>
                </div>

                <!-- Date & Time -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="date" class="block text-lg font-semibold text-gray-700 mb-3">
                            <i class="fas fa-calendar mr-2 text-purple-600"></i>
                            Date
                        </label>
                        <input type="date" 
                               id="date" 
                               name="date" 
                               class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               required>
                    </div>
                    <div>
                        <label for="time" class="block text-lg font-semibold text-gray-700 mb-3">
                            <i class="fas fa-clock mr-2 text-purple-600"></i>
                            Time
                        </label>
                        <input type="time" 
                               id="time" 
                               name="time" 
                               class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               required>
                    </div>
                </div>

                <!-- Artist -->
                <div class="mb-8">
                    <label for="artist" class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user-music mr-2 text-purple-600"></i>
                        Artist/Performer
                    </label>
                    <input type="text" 
                           id="artist" 
                           name="artist" 
                           placeholder="e.g., Imagine Dragons, Taylor Swift"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
                    <p class="text-sm text-gray-500 mt-2">You can add multiple artists separated by commas</p>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <label for="description" class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-align-left mr-2 text-purple-600"></i>
                        Description
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              placeholder="Describe your concert event, what makes it special, what attendees can expect..."
                              class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"
                              required></textarea>
                    <p class="text-sm text-gray-500 mt-2">A compelling description helps attract more attendees</p>
                </div>

                <!-- Concert Image -->
                <div class="mb-8">
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-image mr-2 text-purple-600"></i>
                        Concert Image
                    </label>
                    
                    <!-- Upload Area -->
                    <div class="upload-area rounded-xl p-8 text-center cursor-pointer" id="uploadArea">
                        <div id="uploadContent">
                            <div class="mb-4">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            </div>
                            <p class="text-lg text-gray-600 mb-2">Drop your concert image here, or <span class="text-purple-600 font-semibold">click to browse</span></p>
                            <p class="text-sm text-gray-500">Supports: JPG, PNG, WebP (Max: 5MB)</p>
                            <p class="text-sm text-gray-500 mt-2">Recommended: 1200x630px for best quality</p>
                        </div>
                        
                        <!-- Preview Area -->
                        <div id="imagePreview" class="hidden">
                            <img id="previewImg" src="" alt="Image Preview" class="max-w-full h-64 object-cover rounded-lg mx-auto">
                            <p class="text-sm text-gray-600 mt-2" id="fileName"></p>
                            <button type="button" id="removeImage" class="mt-4 text-red-600 hover:text-red-800 font-medium">
                                <i class="fas fa-trash mr-1"></i>
                                Remove Image
                            </button>
                        </div>
                        
                        <input type="file" 
                               id="concert_image" 
                               name="concert_image" 
                               accept="image/*" 
                               class="hidden"
                               required>
                    </div>
                </div>

                <!-- Concert Status -->
                <div class="mb-8">
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-toggle-on mr-2 text-purple-600"></i>
                        Concert Status
                    </label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="draft" checked class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2 text-gray-700">Save as Draft</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="published" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2 text-gray-700">Publish Immediately</span>
                        </label>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">You can always change this later. Draft concerts are not visible to the public.</p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6 border-t border-gray-200">
                    <a href="{{ route('organizer.concerts') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit" name="action" value="draft"
                            class="inline-flex items-center justify-center px-8 py-4 border border-purple-500 text-purple-600 font-semibold rounded-xl hover:bg-purple-50 transition duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Save as Draft
                    </button>
                    <button type="submit" name="action" value="next"
                            class="inline-flex items-center justify-center px-8 py-4 btn-gradient text-white font-semibold rounded-xl transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Next: Add Tickets
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image Upload Functionality
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('concert_image');
            const uploadContent = document.getElementById('uploadContent');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const fileName = document.getElementById('fileName');
            const removeImageBtn = document.getElementById('removeImage');

            // Click to upload
            uploadArea.addEventListener('click', function() {
                if (!imagePreview.classList.contains('hidden')) return;
                fileInput.click();
            });

            // Drag and drop
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileUpload(files[0]);
                }
            });

            // File input change
            fileInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    handleFileUpload(e.target.files[0]);
                }
            });

            // Remove image
            removeImageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                fileInput.value = '';
                uploadContent.classList.remove('hidden');
                imagePreview.classList.add('hidden');
            });

            function handleFileUpload(file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file.');
                    return;
                }

                // Validate file size (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB.');
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    uploadContent.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            // Form validation and enhancement
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const submitBtn = e.submitter;
                const originalText = submitBtn.innerHTML;
                
                if (submitBtn.name === 'action' && submitBtn.value === 'next') {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Concert...';
                } else {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving Draft...';
                }
                
                submitBtn.disabled = true;

                // Simulate form processing (remove this in production)
                setTimeout(() => {
                    if (submitBtn.value === 'next') {
                        alert('Concert created! Redirecting to ticket pricing... (This is a demo)');
                    } else {
                        alert('Concert saved as draft! (This is a demo)');
                    }
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);

                // Prevent actual form submission for demo
                e.preventDefault();
            });

            // Add smooth animations to form inputs
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.01)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Auto-save functionality (demo)
            let autoSaveTimeout;
            const formInputs = form.querySelectorAll('input, textarea, select');
            
            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(autoSaveTimeout);
                    
                    // Show auto-save indicator
                    showAutoSaveIndicator();
                    
                    autoSaveTimeout = setTimeout(() => {
                        // Simulate auto-save
                        console.log('Auto-saving changes...');
                        hideAutoSaveIndicator();
                    }, 2000);
                });
            });

            function showAutoSaveIndicator() {
                let indicator = document.getElementById('autosave-indicator');
                if (!indicator) {
                    indicator = document.createElement('div');
                    indicator.id = 'autosave-indicator';
                    indicator.className = 'fixed top-20 right-4 bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg shadow-lg border border-yellow-200 transition-all duration-300';
                    indicator.innerHTML = '<i class="fas fa-clock mr-2"></i>Auto-saving...';
                    document.body.appendChild(indicator);
                }
                indicator.style.opacity = '1';
                indicator.style.transform = 'translateX(0)';
            }

            function hideAutoSaveIndicator() {
                const indicator = document.getElementById('autosave-indicator');
                if (indicator) {
                    indicator.innerHTML = '<i class="fas fa-check mr-2"></i>Changes saved';
                    indicator.className = 'fixed top-20 right-4 bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-lg border border-green-200 transition-all duration-300';
                    
                    setTimeout(() => {
                        indicator.style.opacity = '0';
                        indicator.style.transform = 'translateX(100%)';
                    }, 1500);
                }
            }

            // Set minimum date to today
            const dateInput = document.getElementById('date');
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        });
    </script>
</body>
</html>