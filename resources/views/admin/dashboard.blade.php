@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="stats-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
    <!-- Posts Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-green-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-newspaper text-green-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-green-600">{{ $totalPosts ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Total Posts</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Blog articles published</p>
        <a href="/admin/posts" class="inline-flex items-center text-green-600 hover:text-green-800 text-xs md:text-sm font-medium">
            Manage Posts <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Projects Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-blue-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-project-diagram text-blue-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-blue-600">{{ $totalProjects ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Total Projects</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Active initiatives</p>
        <a href="/admin/projects" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-xs md:text-sm font-medium">
            Manage Projects <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Events Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-yellow-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-calendar-alt text-yellow-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-yellow-600">{{ $totalEvents ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Total Events</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Upcoming & past events</p>
        <a href="/admin/events" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 text-xs md:text-sm font-medium">
            Manage Events <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Contacts Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-purple-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-envelope text-purple-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-purple-600">{{ $totalContacts ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Contact Messages</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Inquiries from visitors</p>
        <a href="/admin/contacts" class="inline-flex items-center text-purple-600 hover:text-purple-800 text-xs md:text-sm font-medium">
            View Messages <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Subscribers Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-pink-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-users text-pink-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-pink-600">{{ $totalSubscribers ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Newsletter Subscribers</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Email subscribers</p>
        <a href="/admin/subscribers" class="inline-flex items-center text-pink-600 hover:text-pink-800 text-xs md:text-sm font-medium">
            Manage Subscribers <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Partners Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-orange-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-handshake text-orange-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-orange-600">{{ $totalPartners ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Active Partners</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Partner organizations</p>
        <a href="/admin/partners" class="inline-flex items-center text-orange-600 hover:text-orange-800 text-xs md:text-sm font-medium">
            Manage Partners <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Donations Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-red-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-dollar-sign text-red-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-red-600">${{ number_format($totalDonationAmount ?? 0, 2) }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Total Donations</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">{{ $totalDonations ?? 0 }} donations received</p>
        <a href="/admin/donations" class="inline-flex items-center text-red-600 hover:text-red-800 text-xs md:text-sm font-medium">
            View Donations <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Team Members Card -->
    <div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-3 md:mb-4">
            <div class="bg-indigo-100 p-2 md:p-3 rounded-full">
                <i class="fas fa-users text-indigo-600 text-lg md:text-xl"></i>
            </div>
            <span class="text-2xl md:text-3xl font-bold text-indigo-600">{{ $totalTeamMembers ?? 0 }}</span>
        </div>
        <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Team Members</h3>
        <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Active team members</p>
        <a href="/admin/team" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-xs md:text-sm font-medium">
            Manage Team <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

   <!-- Volunteers Card -->
<div class="stat-card bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
    <div class="flex items-center justify-between mb-3 md:mb-4">
        <div class="bg-teal-100 p-2 md:p-3 rounded-full">
            <i class="fas fa-hands-helping text-teal-600 text-lg md:text-xl"></i>
        </div>
        <span class="text-2xl md:text-3xl font-bold text-teal-600">{{ $totalVolunteers ?? 0 }}</span>
    </div>
    <h3 class="text-gray-700 font-semibold text-sm md:text-lg mb-1">Volunteers</h3>
    <p class="text-gray-400 text-xs md:text-sm mb-2 md:mb-3">Volunteer applications</p>
    <a href="/volunteers" class="inline-flex items-center text-teal-600 hover:text-teal-800 text-xs md:text-sm font-medium">
        View Applications <i class="fas fa-arrow-right ml-1"></i>
    </a>
</div>
</div>
@endsection