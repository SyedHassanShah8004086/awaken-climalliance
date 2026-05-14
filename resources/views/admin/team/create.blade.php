@extends('admin.layouts.app')

@section('title', 'Add Team Member')

@section('content')
<style>
    .image-preview {
        display: none;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
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
</style>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-6">➕ Add Team Member</h2>
    
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Name *</label>
            <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Position *</label>
            <input type="text" name="position" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Bio *</label>
            <textarea name="bio" rows="4" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
        </div>
        
        <!-- Image Upload -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Profile Image</label>
            <div class="upload-area" id="uploadArea">
                <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">
                <div id="uploadContent">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                    <p class="text-gray-500">Click or drag & drop to upload image</p>
                    <p class="text-sm text-gray-400 mt-1">Recommended: 400x400px (JPG, PNG) Max: 2MB</p>
                </div>
            </div>
            <div class="preview-container">
                <img id="imagePreview" class="image-preview" alt="Image Preview">
            </div>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">LinkedIn URL</label>
            <input type="url" name="linkedin" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="https://linkedin.com/in/username">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Twitter URL</label>
            <input type="url" name="twitter" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="https://twitter.com/username">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Display Order</label>
            <input type="number" name="order" value="0" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            <p class="text-sm text-gray-500">Lower numbers appear first</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Status</label>
            <select name="is_active" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="1">Active (Show on website)</option>
                <option value="0">Inactive (Hidden)</option>
            </select>
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.team') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Cancel</a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save Team Member</button>
        </div>
    </form>
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
</script>
@endsection