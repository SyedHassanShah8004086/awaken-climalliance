<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Welcome to Awaken ClimAlliance!</h3>
                            <p class="text-gray-600 mt-1">You are logged in as: <span class="font-semibold text-green-600">{{ Auth::user()->name }}</span></p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-green-600 text-xl"></i>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        @if(auth()->user()->is_admin)
                            <a href="/admin" class="bg-green-600 text-white text-center px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-tachometer-alt mr-2"></i> Go to Admin Panel →
                            </a>
                        @endif
                        <a href="/" class="bg-blue-600 text-white text-center px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-globe mr-2"></i> Visit Website →
                        </a>
                    </div>
                    
                    @if(!auth()->user()->is_admin)
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                            <h4 class="font-semibold text-gray-700 mb-2">Your Account Information</h4>
                            <p class="text-sm text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p class="text-sm text-gray-600"><strong>Member since:</strong> {{ Auth::user()->created_at->format('F d, Y') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>