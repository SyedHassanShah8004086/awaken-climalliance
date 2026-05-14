<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Partner - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <h2 class="text-2xl font-bold">➕ Add New Partner</h2>
            <a href="{{ route('partners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Partner Name *</label>
                    <input type="text" name="name" class="w-full border rounded-lg px-3 py-2" required>
                </div>

<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Logo/Image</label>
    <input type="file" name="logo" class="w-full border rounded-lg px-3 py-2" accept="image/*">
    <p class="text-sm text-gray-500 mt-1">Recommended size: 200x200px. Max size: 5MB</p>
</div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Website URL</label>
                    <input type="url" name="website" class="w-full border rounded-lg px-3 py-2" placeholder="https://example.com">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Display Order</label>
                    <input type="number" name="order" class="w-full border rounded-lg px-3 py-2" value="0" placeholder="Lower numbers appear first">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="is_active" class="w-full border rounded-lg px-3 py-2">
                        <option value="1">Active (Show on website)</option>
                        <option value="0">Inactive (Hidden)</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save Partner</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>