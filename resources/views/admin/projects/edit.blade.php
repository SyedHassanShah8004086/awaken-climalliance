<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .image-preview {
            max-width: 200px;
            margin-top: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .current-image {
            margin-bottom: 10px;
            padding: 10px;
            background: #f3f4f6;
            border-radius: 10px;
            display: inline-block;
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
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-700 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">🌍 Awaken ClimAlliance Admin</h1>
            <div>
                <span>{{ auth()->user()->name }}</span>
                <a href="/logout" class="ml-4 bg-red-600 px-3 py-1 rounded"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="/logout" method="POST" class="hidden">@csrf</form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">✏️ Edit Project</h2>
            <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Title *</label>
                    <input type="text" name="title" value="{{ $project->title }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Category</label>
                    <input type="text" name="category" value="{{ $project->category }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Current Image Display -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Current Image</label>
                    @if($project->image && file_exists(public_path('storage/' . $project->image)))
                        <div class="current-image">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="image-preview">
                            <p class="text-xs text-gray-500 mt-1">Current project image</p>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No image uploaded</p>
                    @endif
                </div>

                <!-- Image Upload Field -->
              <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Change Image (Optional)</label>
    <div class="upload-area" id="uploadArea">
        <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">
        <div id="uploadContent">
            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
            <p class="text-gray-500 text-sm">Click to upload new image</p>
            <p class="text-xs text-gray-400 mt-1">Leave empty to keep current image</p>
            <p class="text-xs text-gray-400">Max size: 5MB (JPG, PNG, GIF, WEBP)</p>
        </div>
    </div>
</div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Short Description</label>
                    <textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ $project->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Full Description</label>
                    <textarea name="full_description" rows="6" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ $project->full_description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="upcoming" {{ $project->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Update Project</button>
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
            } else if (file) {
                alert('Please upload a valid image file (JPG, PNG, GIF).');
                imageInput.value = '';
            }
        });
    </script>
</body>
</html>