@extends('admin.layouts.app')

@section('title', 'Donation Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">💰 Donation Details</h2>
        <a href="{{ route('admin.donations') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Back</a>
    </div>
    
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-500">Name:</p>
            <p class="font-semibold text-lg">{{ $donation->name }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email:</p>
            <p class="font-semibold text-lg">{{ $donation->email }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Phone:</p>
            <p class="font-semibold">{{ $donation->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Amount:</p>
            <p class="font-semibold text-2xl text-green-600">${{ number_format($donation->amount, 2) }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Status:</p>
            <p class="font-semibold capitalize">
                <span class="px-2 py-1 text-xs rounded 
                    @if($donation->status == 'completed') bg-green-100 text-green-800
                    @elseif($donation->status == 'pending') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($donation->status) }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Date:</p>
            <p class="font-semibold">{{ $donation->created_at->format('F d, Y h:i A') }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-sm text-gray-500">Message:</p>
            <p class="font-semibold p-3 bg-gray-50 rounded">{{ $donation->message ?? 'No message' }}</p>
        </div>
    </div>
</div>
@endsection