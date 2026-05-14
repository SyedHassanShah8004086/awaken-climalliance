<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - Admin</title>
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
            <h2 class="text-2xl font-bold">✏️ Edit Event</h2>
            <a href="{{ route('events.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Event Title *</label>
                    <input type="text" name="title" value="{{ $event->title }}" class="w-full border rounded-lg px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Location *</label>
                    <input type="text" name="location" value="{{ $event->location }}" class="w-full border rounded-lg px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2">{{ $event->description }}</textarea>
                </div>

                <!-- Current Image Display -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Current Event Image</label>
                    @if($event->featured_image && file_exists(public_path($event->featured_image)))
                        <div class="mb-2">
                            <img src="{{ asset($event->featured_image) }}" alt="{{ $event->title }}" class="w-32 h-32 object-cover rounded">
                            <p class="text-sm text-gray-500 mt-1">Current image</p>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No image uploaded</p>
                    @endif
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Change Event Image (Optional)</label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="featured_image" id="imageInput" class="hidden" accept="image/*">
                        <div id="uploadContent">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Click or drag & drop to upload new image</p>
                            <p class="text-sm text-gray-400 mt-1">Leave empty to keep current image</p>
                        </div>
                    </div>
                    <div class="preview-container">
                        <img id="imagePreview" class="image-preview" alt="Image Preview">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Event Start Date *</label>
                        <input type="datetime-local" name="event_date" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Event End Date</label>
                        <input type="datetime-local" name="event_end_date" value="{{ $event->event_end_date ? \Carbon\Carbon::parse($event->event_end_date)->format('Y-m-d\TH:i') : '' }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Registration Link</label>
                    <input type="url" name="registration_link" value="{{ $event->registration_link }}" class="w-full border rounded-lg px-3 py-2" placeholder="https://...">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="w-full border rounded-lg px-3 py-2">
                        <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ $event->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('events.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Update Event</button>
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
    </script>
</body>
</html>