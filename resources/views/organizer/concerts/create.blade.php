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
            <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-4">
                Add Concert
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Create your concert and start selling tickets to music fans worldwide.
            </p>
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
                           placeholder="e.g., Rock Festival 2025"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
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
                           placeholder="e.g., Madison Square Garden, New York"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
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
                           placeholder="e.g., The Rolling Stones"
                           class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           required>
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
                              placeholder="Describe your concert..."
                              class="form-input w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"
                              required></textarea>
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
                        </div>
                        
                        <!-- Preview Area -->
                        <div id="imagePreview" class="hidden">
                            <img id="previewImg" src="" alt="Concert Preview" class="max-w-full h-64 object-cover rounded-lg mx-auto">
                            <button type="button" id="removeImage" class="mt-4 text-red-600 hover:text-red-800 font-medium">
                                <i class="fas fa-trash mr-1"></i>
                                Remove Image
                            </button>
                        </div>
                        
                        <input type="file" 
                               id="concert_image" 
                               name="concert_image" 
                               accept="image/*" 
                               class="hidden">
                    </div>
                </div>

                <!-- Ticket Pricing Section -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-ticket-alt mr-2 text-purple-600"></i>
                        Ticket Categories
                    </h3>
                    
                    <div id="ticketCategories">
                        <!-- Regular Ticket -->
                        <div class="bg-white rounded-lg p-4 border border-gray-200 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                                    <input type="text" 
                                           name="ticket_categories[0][name]" 
                                           placeholder="e.g., Regular"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Price (Rp)</label>
                                    <input type="number" 
                                           name="ticket_categories[0][price]" 
                                           placeholder="150000"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                                    <input type="number" 
                                           name="ticket_categories[0][quantity]" 
                                           placeholder="100"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- VIP Ticket -->
                        <div class="bg-white rounded-lg p-4 border border-gray-200 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                                    <input type="text" 
                                           name="ticket_categories[1][name]" 
                                           placeholder="e.g., VIP"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Price (Rp)</label>
                                    <input type="number" 
                                           name="ticket_categories[1][price]" 
                                           placeholder="300000"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                                    <input type="number" 
                                           name="ticket_categories[1][quantity]" 
                                           placeholder="50"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" id="addTicketCategory" class="text-purple-600 hover:text-purple-800 font-medium">
                        <i class="fas fa-plus mr-1"></i>
                        Add Another Category
                    </button>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6 border-t border-gray-200">
                    <a href="{{ route('organizer.concerts') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <button type="button" 
                            class="inline-flex items-center justify-center px-8 py-4 border border-purple-500 text-purple-600 font-semibold rounded-xl hover:bg-purple-50 transition duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Save as Draft
                    </button>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-8 py-4 btn-gradient text-white font-semibold rounded-xl transition duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-rocket mr-2"></i>
                        Create Concert
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
                    uploadContent.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            // Add ticket category functionality
            let categoryCount = 2;
            document.getElementById('addTicketCategory').addEventListener('click', function() {
                const container = document.getElementById('ticketCategories');
                const newCategory = document.createElement('div');
                newCategory.className = 'bg-white rounded-lg p-4 border border-gray-200 mb-4';
                newCategory.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                            <input type="text" 
                                   name="ticket_categories[${categoryCount}][name]" 
                                   placeholder="e.g., Early Bird"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                   required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price (Rp)</label>
                            <input type="number" 
                                   name="ticket_categories[${categoryCount}][price]" 
                                   placeholder="100000"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                   required>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                                <input type="number" 
                                       name="ticket_categories[${categoryCount}][quantity]" 
                                       placeholder="50"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                       required>
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove-category px-3 py-2 text-red-600 hover:text-red-800 border border-red-300 rounded-lg hover:bg-red-50">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(newCategory);
                categoryCount++;

                // Add remove functionality
                newCategory.querySelector('.remove-category').addEventListener('click', function() {
                    newCategory.remove();
                });
            });

            // Form validation and enhancement
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                // Add loading state to submit button
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Concert...';
                submitBtn.disabled = true;
            });

            // Add smooth animations to form inputs
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>