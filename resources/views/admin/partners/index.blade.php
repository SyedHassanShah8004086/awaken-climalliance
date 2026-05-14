@extends('admin.layouts.app')

@section('title', 'Manage Partners')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex justify-between items-center">
        <h2 class="text-xl font-semibold">🤝 Partners</h2>
        <a href="{{ route('partners.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add New Partner</a>
    </div>
    
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-4">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Website</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr>
                    <td class="px-6 py-4">
                        @if($partner->logo && file_exists(public_path($partner->logo)))
                            <img src="{{ asset($partner->logo) }}" class="w-10 h-10 object-cover rounded">
                        @else
                            <i class="fas fa-building text-gray-400"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $partner->name }}</td>
                    <td class="px-6 py-4">
                        @if($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ Str::limit($partner->website, 30) }}</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded {{ $partner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $partner->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('partners.edit', $partner) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                        <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this partner?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No partners added yet. Click "Add New Partner" to get started.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $partners->links() }}
    </div>
</div>
@endsection