@extends('admin.layouts.app')

@section('title', 'Partnership Requests')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b">
        <h2 class="text-xl font-semibold">🤝 Partnership Requests</h2>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Organization</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact Person</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $request)
                <tr>
                    <td class="px-6 py-4">{{ $request->id }}</td>
                    <td class="px-6 py-4 font-semibold">{{ $request->organization }}</td>
                    <td class="px-6 py-4">{{ $request->contact_person }}</td>
                    <td class="px-6 py-4">{{ $request->email }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded 
                            @if($request->status == 'approved') bg-green-100 text-green-800
                            @elseif($request->status == 'rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $request->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.partnerships.show', $request) }}" class="text-blue-600 hover:text-blue-800 mr-3">View</a>
                        <form action="{{ route('admin.partnerships.destroy', $request) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this request?')">Delete</button>
                        </form>
                     </div>
                 </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No partnership requests yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $requests->links() }}
    </div>
</div>
@endsection