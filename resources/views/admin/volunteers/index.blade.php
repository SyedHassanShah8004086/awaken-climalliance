@extends('admin.layouts.app')

@section('title', 'Volunteer Applications')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b">
        <h2 class="text-xl font-semibold">🤝 Volunteer Applications</h2>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($volunteers as $volunteer)
                <tr>
                    <td class="px-6 py-4">{{ $volunteer->id }}</td>
                    <td class="px-6 py-4 font-semibold">{{ $volunteer->name }}</td>
                    <td class="px-6 py-4">{{ $volunteer->email }}</td>
                    <td class="px-6 py-4">{{ $volunteer->phone ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $volunteer->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.volunteers.show', $volunteer) }}" class="text-blue-600 hover:text-blue-800 mr-3">View</a>
                        <form action="{{ route('admin.volunteers.destroy', $volunteer) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this application?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No volunteer applications yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $volunteers->links() }}
    </div>
</div>
@endsection