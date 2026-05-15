@extends('admin.layouts.app')

@section('title', 'Partnership Request Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Partnership Request Details</h2>
    
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-gray-500">Organization:</p>
            <p class="font-semibold">{{ $partnership->organization }}</p>
        </div>
        <div>
            <p class="text-gray-500">Contact Person:</p>
            <p class="font-semibold">{{ $partnership->contact_person }}</p>
        </div>
        <div>
            <p class="text-gray-500">Email:</p>
            <p class="font-semibold">{{ $partnership->email }}</p>
        </div>
        <div>
            <p class="text-gray-500">Phone:</p>
            <p class="font-semibold">{{ $partnership->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <p class="text-gray-500">Status:</p>
            <p class="font-semibold">{{ ucfirst($partnership->status) }}</p>
        </div>
        <div>
            <p class="text-gray-500">Date Received:</p>
            <p class="font-semibold">{{ $partnership->created_at->format('F d, Y h:i A') }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-500">Message:</p>
            <p class="p-3 bg-gray-50 rounded">{{ $partnership->message ?? 'No message' }}</p>
        </div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('admin.partnerships') }}" class="bg-gray-500 text-white px-4 py-2 rounded">← Back</a>
    </div>
</div>
@endsection