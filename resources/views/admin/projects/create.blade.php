<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project - Admin</title>
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
        .preview-container {
            margin-top: 10px;
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
        .upload-area.dragover {
            border-color: #22c55e;
            background-color: #dcfce7;
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
            <h2 class="text-2xl font-bold">✍️ Create New Project</h2>
            <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Title *</label>
        <input type="text" name="title" class="w-full border rounded-lg px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Category</label>
        <input type="text" name="category" class="w-full border rounded-lg px-3 py-2">
    </div>

    <!-- Image Upload -->
    <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Project Image *</label>
    <input type="file" name="image" class="w-full border rounded-lg px-3 py-2" accept="image/*" required>
    <p class="text-sm text-gray-500 mt-1">Max size: 5MB (JPG, PNG, GIF, WEBP)</p>
</div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Short Description</label>
        <textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Full Description</label>
        <textarea name="full_description" rows="5" class="w-full border rounded-lg px-3 py-2"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Status</label>
        <select name="status" class="w-full border rounded-lg px-3 py-2">
            <option value="active">Active</option>
            <option value="completed">Completed</option>
            <option value="upcoming">Upcoming</option>
        </select>
    </div>

    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Create Project</button>
</form>
        </div>
    </div>

    <script>
        // Image preview and drag & drop functionality
        const uploadArea = document.getElementById('uploadArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const uploadContent = document.getElementById('uploadContent');

        // Click to upload
        uploadArea.addEventListener('click', () => {
            imageInput.click();
        });

        // File input change
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            handleFile(file);
        });

        // Drag & drop events
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                imageInput.files = e.dataTransfer.files;
                handleFile(file);
            } else {
                alert('Please upload an image file.');
            }
        });

        function handleFile(file) {
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
        }

        // Reset preview if needed (optional)
        function resetPreview() {
            imagePreview.style.display = 'none';
            uploadContent.style.display = 'block';
            imageInput.value = '';
        }
    </script>
</body>
</html>