<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .image-preview {
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
        .current-image {
            margin-bottom: 15px;
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
            <h2 class="text-2xl font-bold">✏️ Edit Post</h2>
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
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" required>
                </div>

                <!-- Current Featured Image -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Current Featured Image</label>
                    @if($post->featured_image && file_exists(public_path($post->featured_image)))
                        <div class="current-image">
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="image-preview">
                            <p class="text-sm text-gray-500 mt-1">Current image</p>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No image uploaded</p>
                    @endif
                </div>

                <!-- Change Featured Image -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Change Featured Image (Optional)</label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="featured_image" id="imageInput" class="hidden" accept="image/*">
                        <div id="uploadContent">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Click or drag & drop to upload new image</p>
                            <p class="text-sm text-gray-400 mt-1">Leave empty to keep current image</p>
                            <p class="text-xs text-gray-400">Recommended: 800x500px (Max 5MB)</p>
                        </div>
                    </div>
                    <div class="preview-container">
                        <img id="imagePreview" class="image-preview" style="display: none;" alt="New Image Preview">
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Category</label>
                    <input type="text" name="category" value="{{ $post->category }}" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" placeholder="Climate Action, Policy, News">
                </div>

                <!-- Excerpt -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Excerpt (Short Summary)</label>
                    <textarea name="excerpt" rows="3" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none">{{ $post->excerpt }}</textarea>
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Content (Full Article) <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="10" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none" required>{{ $post->content }}</textarea>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none">
                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>🚀 Published</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                        <i class="fas fa-save mr-1"></i> Update Post
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

        if (uploadArea) {
            uploadArea.addEventListener('click', () => {
                imageInput.click();
            });
        }

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
        if (uploadArea) {
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
        }
    </script>
</body>
</html>