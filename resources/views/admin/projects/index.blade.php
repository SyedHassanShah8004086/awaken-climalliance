@extends('admin.layouts.app')

@section('title', 'Manage Projects')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex justify-between items-center">
        <h2 class="text-xl font-semibold">🚀 Projects</h2>
        <a href="{{ route('projects.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Create New Project</a>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td class="px-6 py-4">
                        @if($project->image && file_exists(public_path($project->image)))
                            <img src="{{ asset($project->image) }}" class="w-10 h-10 object-cover rounded">
                        @else
                            <i class="fas fa-image text-gray-400"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $project->title }}</td>
                    <td class="px-6 py-4">{{ $project->category ?? 'General' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded {{ $project->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $project->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this project?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No projects yet. Create your first project!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection