@extends('admin.layouts.app')

@section('title', 'View Message')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">📧 Message from {{ $contact->name }}</h2>
        <a href="{{ route('admin.contacts') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
    </div>
    
    <div class="grid grid-cols-2 gap-4 mb-6 pb-4 border-b">
        <div>
            <p class="text-sm text-gray-500">From:</p>
            <p class="font-semibold">{{ $contact->name }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email:</p>
            <p class="font-semibold">{{ $contact->email }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Subject:</p>
            <p class="font-semibold">{{ $contact->subject ?? 'No subject' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Received:</p>
            <p class="font-semibold">{{ $contact->created_at->format('F d, Y h:i A') }}</p>
        </div>
    </div>
    
    <div>
        <p class="text-sm text-gray-500 mb-2">Message:</p>
        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-gray-700 whitespace-pre-line">{{ $contact->message }}</p>
        </div>
    </div>
    
    <div class="mt-6 pt-4 border-t">
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Delete this message?')">
                Delete Message
            </button>
        </form>
    </div>
</div>
@endsection