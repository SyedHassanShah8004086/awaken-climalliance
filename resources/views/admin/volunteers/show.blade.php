@extends('admin.layouts.app')

@section('title', 'Volunteer Application Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">🤝 Volunteer Application</h2>
        <a href="{{ route('admin.volunteers') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
    </div>
    
    <div class="grid grid-cols-2 gap-4 mb-6 pb-4 border-b">
        <div>
            <p class="text-sm text-gray-500">Name:</p>
            <p class="font-semibold text-lg">{{ $volunteer->name }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email:</p>
            <p class="font-semibold">{{ $volunteer->email }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Phone:</p>
            <p class="font-semibold">{{ $volunteer->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Submitted:</p>
            <p class="font-semibold">{{ $volunteer->created_at->format('F d, Y h:i A') }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-sm text-gray-500">Message:</p>
            <div class="bg-gray-50 p-4 rounded-lg mt-1">
                <p class="text-gray-700 whitespace-pre-line">{{ $volunteer->message ?? 'No message provided' }}</p>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <form action="{{ route('admin.volunteers.destroy', $volunteer) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Delete this application?')">
                Delete Application
            </button>
        </form>
    </div>
</div>
@endsection