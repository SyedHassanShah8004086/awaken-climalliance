@extends('admin.layouts.app')

@section('title', 'Manage Events')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex justify-between items-center">
        <h2 class="text-xl font-semibold">📅 Events</h2>
        <a href="{{ route('events.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Create New Event</a>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Event Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td class="px-6 py-4">
                        @if($event->featured_image && file_exists(public_path($event->featured_image)))
                            <img src="{{ asset($event->featured_image) }}" class="w-10 h-10 object-cover rounded">
                        @else
                            <i class="fas fa-calendar text-gray-400"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $event->title }}</td>
                    <td class="px-6 py-4">{{ $event->location }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded 
                            @if($event->status == 'upcoming') bg-blue-100 text-blue-800
                            @elseif($event->status == 'ongoing') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('events.edit', $event) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No events yet. Create your first event!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $events->links() }}
    </div>
</div>
@endsection