<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .image-preview {
            display: none;
            max-width: 200px;
            margin-top: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            border-color: #22c55e;
            background-color: #f0fdf4;
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-700 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">🌍 Awaken ClimAlliance Admin</h1>
            <div class="flex items-center gap-4">
                <span>{{ auth()->user()->name }}</span>
                <a href="/logout" class="bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
                <form id="logout-form" action="/logout" method="POST" class="hidden">@csrf</form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">✍️ Create New Post</h2>
            <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-6">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" required>
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Featured Image</label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="featured_image" id="imageInput" class="hidden" accept="image/*">
                        <div id="uploadContent">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Click or drag & drop to upload image</p>
                            <p class="text-sm text-gray-400 mt-1">Recommended: 800x500px (JPG, PNG, GIF) Max: 5MB</p>
                        </div>
                    </div>
                    <div class="preview-container">
                        <img id="imagePreview" class="image-preview" alt="Image Preview">
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Category</label>
                    <input type="text" name="category" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" placeholder="Climate Action, Policy, News">
                </div>

                <!-- Excerpt -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Excerpt (Short Summary)</label>
                    <textarea name="excerpt" rows="3" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none"></textarea>
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Content (Full Article) <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="10" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" required></textarea>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none">
                        <option value="draft">📝 Draft</option>
                        <option value="published">🚀 Published</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                        <i class="fas fa-save mr-1"></i> Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const uploadContent = document.getElementById('uploadContent');

        uploadArea.addEventListener('click', () => {
            imageInput.click();
        });

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    uploadContent.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-green-500', 'bg-green-50');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('border-green-500', 'bg-green-50');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-green-500', 'bg-green-50');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                imageInput.files = e.dataTransfer.files;
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    uploadContent.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>