@extends('layouts.app')

@section('title', 'Support Our Work - Donate to Awaken ClimAlliance')

@section('content')
    <!-- Your donate page content here -->

<style>
    .donation-card {
        transition: all 0.3s ease;
    }
    .donation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .amount-btn {
        transition: all 0.3s ease;
    }
    .amount-btn:hover, .amount-btn.active {
        background-color: #15803d;
        color: white;
        border-color: #15803d;
    }
</style>

<!-- Donate Header -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6">🤝 Support Our Work</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4">Make a <span class="text-yellow-300">Donation</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">Your support helps us empower youth and protect our planet for future generations.</p>
    </div>
</section>

<!-- Donation Section -->
<section class="py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Left Column - Impact Info -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 donation-card">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-seedling text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Your Impact</h3>
                            <p class="text-gray-600">See how your donation helps</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$10</span>
                            <span class="text-gray-600">Plants 50 trees</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$50</span>
                            <span class="text-gray-600">Supports 5 youth workshops</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$100</span>
                            <span class="text-gray-600">Funds 1 awareness campaign</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$500</span>
                            <span class="text-gray-600">Sponsors 1 community project</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-6 text-center">
                    <i class="fas fa-heart text-4xl text-green-600 mb-3"></i>
                    <p class="text-gray-700 italic">"Every contribution, big or small, makes a difference in our fight against climate change."</p>
                    <p class="text-gray-600 mt-3 font-semibold">- Awaken ClimAlliance Team</p>
                </div>
            </div>
            
            <!-- Right Column - Donation Form -->
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Make a Donation</h2>
                
                @if(session('donation_success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>{{ session('donation_success') }}</span>
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('donate.submit') }}" method="POST">
                    @csrf
                    
                    <!-- Donation Amount -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-3">Select Amount</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="10">$10</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="25">$25</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="50">$50</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="100">$100</button>
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-600 text-sm mb-1">Or enter custom amount</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">$</span>
                                <input type="number" name="amount" id="custom_amount" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Personal Information -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                        <input type="tel" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Message (Optional)</label>
                        <textarea name="message" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Any special instructions or message?"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 hover:scale-105 shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-heart"></i> Donate Now
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-lock mr-1"></i> Secure donation processing
                    </p>
                    <p class="text-xs text-gray-400 mt-2">
                        Your donation is tax-deductible. We'll send you a receipt via email.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Stats -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our <span class="gradient-text">Impact</span></h2>
        <div class="w-20 h-1 bg-green-600 mx-auto rounded-full mb-10"></div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <div class="text-4xl font-bold text-green-600 mb-2">300+</div>
                <p class="text-gray-600">Youth Trained</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <div class="text-4xl font-bold text-green-600 mb-2">50+</div>
                <p class="text-gray-600">Awareness Sessions</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <div class="text-4xl font-bold text-green-600 mb-2">10+</div>
                <p class="text-gray-600">Active Projects</p>
            </div>
        </div>
    </div>
</section>
@endsection